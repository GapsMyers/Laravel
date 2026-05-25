<?php

namespace App\Http\Controllers;

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

        DB::transaction(function () use ($validated) {
            $purchaseRequest = PurchaseRequest::query()->create([
                'pr_number' => $this->generatePrNumber(),
                'department' => $validated['department'],
                'requester_name' => $validated['requester_name'],
                'notes' => $validated['notes'] ?? null,
                'requested_at' => $validated['requested_at'],
            ]);

            $purchaseRequest->items()->create($this->buildItemPayload($validated['item']));
        });

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

        return redirect()->route('approval')->with('success', 'Request berhasil ditolak.');
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
