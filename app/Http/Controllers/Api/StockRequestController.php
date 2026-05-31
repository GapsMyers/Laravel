<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StockRequestStoreRequest;
use App\Http\Resources\RequestResource;
use App\Models\AuditLog;
use App\Models\Barang;
use App\Models\Request as PurchaseRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class StockRequestController extends Controller
{
    public function store(StockRequestStoreRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $purchaseRequest = DB::transaction(function () use ($validated, $request) {
            $purchaseRequest = PurchaseRequest::query()->create([
                'pr_number' => $this->generatePrNumber(),
                'department' => $validated['department'],
                'requester_name' => $validated['requester_name'],
                'notes' => $validated['notes'] ?? null,
                'requested_at' => $validated['requested_at'],
            ]);

            $itemPayload = $this->buildItemPayload($validated['item']);
            $purchaseRequest->items()->create($itemPayload);

            AuditLog::query()->create([
                'action' => 'request_created',
                'title' => 'Purchase request created',
                'description' => sprintf(
                    'Request %s dibuat untuk %s (%s).',
                    $purchaseRequest->pr_number,
                    $itemPayload['nama_barang'],
                    $itemPayload['qty_requested']
                ),
                'category' => 'PROCUREMENT',
                'level' => 'info',
                'actor_name' => $purchaseRequest->requester_name,
                'ip_address' => $request->ip(),
                'entity_type' => PurchaseRequest::class,
                'entity_id' => $purchaseRequest->id,
                'metadata' => [
                    'pr_number' => $purchaseRequest->pr_number,
                    'item' => $itemPayload,
                ],
            ]);

            return $purchaseRequest;
        });

        $purchaseRequest->load('items');

        return (new RequestResource($purchaseRequest))
            ->additional([
                'message' => 'Created',
                'errors' => null,
            ])
            ->response()
            ->setStatusCode(201);
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
