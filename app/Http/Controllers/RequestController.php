<?php

namespace App\Http\Controllers;

use App\Models\AuditLog;
use App\Models\Barang;
use App\Models\Request as PurchaseRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RequestController extends Controller
{
    public function index()
    {
        $requests = PurchaseRequest::query()
            ->latest()
            ->with('items')
            ->get();

        $barangs = Barang::query()
            ->select(['id', 'nama_barang', 'kode_barang'])
            ->orderBy('nama_barang')
            ->get();

        return view('admin.Request', [
            'requests' => $requests,
            'barangs' => $barangs,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'department' => ['required', 'string', 'max:255'],
            'requester_name' => ['required', 'string', 'max:255'],
            'requested_at' => ['required', 'date'],
            'notes' => ['nullable', 'string', 'max:1000'],
            'item' => ['required', 'array'],
            'item.barang_id' => ['nullable', 'integer', 'exists:barangs,id'],
            'item.nama_barang' => ['required_without:item.barang_id', 'string', 'max:255'],
            'item.kode_barang' => ['nullable', 'string', 'max:255'],
            'item.qty_requested' => ['required', 'integer', 'min:1'],
        ]);

        $purchaseRequest = DB::transaction(function () use ($validated) {
            $purchaseRequest = PurchaseRequest::query()->create([
                'pr_number' => $this->generatePrNumber(),
                'department' => $validated['department'],
                'requester_name' => $validated['requester_name'],
                'notes' => $validated['notes'] ?? null,
                'requested_at' => $validated['requested_at'],
            ]);

            $purchaseRequest->items()->create($this->buildItemPayload($validated['item']));

            return $purchaseRequest;
        });

        $purchaseRequest->load('items');

        AuditLog::query()->create([
            'action' => 'request_created',
            'title' => 'Purchase request created',
            'description' => sprintf(
                'Request %s dibuat untuk %s (%s).',
                $purchaseRequest->pr_number,
                $purchaseRequest->items->first()?->nama_barang ?? 'barang',
                $purchaseRequest->items->first()?->qty_requested ?? 0
            ),
            'category' => 'PROCUREMENT',
            'level' => 'info',
            'actor_name' => $purchaseRequest->requester_name,
            'ip_address' => $request->ip(),
            'entity_type' => PurchaseRequest::class,
            'entity_id' => $purchaseRequest->id,
            'metadata' => [
                'pr_number' => $purchaseRequest->pr_number,
                'item' => $purchaseRequest->items->first()?->toArray(),
            ],
        ]);

        return redirect()->route('request')->with('success', 'Purchase request berhasil dibuat.');
    }

    public function approvalIndex(Request $request)
    {
        $pendingRequests = PurchaseRequest::query()
            ->where('status', 'pending')
            ->with('items')
            ->latest()
            ->get();

        $selectedRequestId = $request->integer('request');
        $selectedRequest = $pendingRequests->firstWhere('id', $selectedRequestId) ?? $pendingRequests->first();

        return view('admin.approval', [
            'pendingRequests' => $pendingRequests,
            'selectedRequest' => $selectedRequest,
        ]);
    }

    public function approve(PurchaseRequest $purchaseRequest)
    {
        if ($purchaseRequest->status !== 'pending') {
            return redirect()->route('approval')->with('error', 'Request sudah diproses.');
        }

        $purchaseRequest->update([
            'status' => 'approved',
            'approved_at' => now(),
            'rejected_at' => null,
        ]);

        AuditLog::query()->create([
            'action' => 'request_approved',
            'title' => 'Purchase request approved',
            'description' => sprintf('Request %s disetujui.', $purchaseRequest->pr_number),
            'category' => 'APPROVAL',
            'level' => 'info',
            'actor_name' => auth()->user()?->name ?? 'System',
            'ip_address' => request()->ip(),
            'entity_type' => PurchaseRequest::class,
            'entity_id' => $purchaseRequest->id,
            'metadata' => [
                'pr_number' => $purchaseRequest->pr_number,
                'status' => $purchaseRequest->status,
            ],
        ]);

        return redirect()->route('approval', ['request' => $purchaseRequest->id])
            ->with('success', 'Request berhasil disetujui.');
    }

    public function reject(PurchaseRequest $purchaseRequest)
    {
        if ($purchaseRequest->status !== 'pending') {
            return redirect()->route('approval')->with('error', 'Request sudah diproses.');
        }

        $purchaseRequest->update([
            'status' => 'rejected',
            'rejected_at' => now(),
            'approved_at' => null,
        ]);

        AuditLog::query()->create([
            'action' => 'request_rejected',
            'title' => 'Purchase request rejected',
            'description' => sprintf('Request %s ditolak.', $purchaseRequest->pr_number),
            'category' => 'APPROVAL',
            'level' => 'warning',
            'actor_name' => auth()->user()?->name ?? 'System',
            'ip_address' => request()->ip(),
            'entity_type' => PurchaseRequest::class,
            'entity_id' => $purchaseRequest->id,
            'metadata' => [
                'pr_number' => $purchaseRequest->pr_number,
                'status' => $purchaseRequest->status,
            ],
        ]);

        return redirect()->route('approval')->with('success', 'Request berhasil ditolak.');
    }

    public function orderIndex()
    {
        $requests = PurchaseRequest::query()
            ->with('items')
            ->latest()
            ->get();

        $stats = [
            'total' => PurchaseRequest::count(),
            'pending' => PurchaseRequest::where('status', 'pending')->count(),
            'approved' => PurchaseRequest::where('status', 'approved')->count(),
            'received' => PurchaseRequest::where('status', 'received')->count(),
        ];

        $selectedRequestId = request()->integer('request');
        $selectedRequest = $requests->firstWhere('id', $selectedRequestId) ?? $requests->first();

        return view('admin.order', [
            'requests' => $requests,
            'stats' => $stats,
            'selectedRequest' => $selectedRequest,
        ]);
    }

    private function generatePrNumber(): string
    {
        $year = now()->format('Y');

        $lastNumber = PurchaseRequest::query()
            ->whereYear('created_at', $year)
            ->whereNotNull('pr_number')
            ->orderByDesc('id')
            ->value('pr_number');

        $sequence = 1;
        if ($lastNumber && preg_match('/^PR-'.$year.'-(\d+)$/', $lastNumber, $matches)) {
            $sequence = (int) $matches[1] + 1;
        }

        return sprintf('PR-%s-%04d', $year, $sequence);
    }

    /**
     * @param  array<string, mixed>  $item
     * @return array<string, mixed>
     */
    private function buildItemPayload(array $item): array
    {
        if (! empty($item['barang_id'])) {
            $barang = Barang::query()
                ->select(['id', 'nama_barang', 'kode_barang'])
                ->find($item['barang_id']);

            if ($barang) {
                return [
                    'barang_id' => $barang->id,
                    'nama_barang' => $barang->nama_barang,
                    'kode_barang' => $barang->kode_barang,
                    'qty_requested' => (int) $item['qty_requested'],
                    'qty_received' => 0,
                ];
            }
        }

        return [
            'barang_id' => null,
            'nama_barang' => $item['nama_barang'],
            'kode_barang' => $item['kode_barang'] ?? null,
            'qty_requested' => (int) $item['qty_requested'],
            'qty_received' => 0,
        ];
    }
}
