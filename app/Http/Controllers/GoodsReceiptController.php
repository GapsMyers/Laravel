<?php

namespace App\Http\Controllers;

use App\Models\Request as PurchaseRequest;
use App\Models\RequestItem;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GoodsReceiptController extends Controller
{
    public function show(Request $request, ?PurchaseRequest $purchaseRequest = null)
    {
        $availableRequests = PurchaseRequest::query()
            ->whereIn('status', ['approved', 'partial'])
            ->with('items')
            ->latest()
            ->get();

        $requestedId = $request->integer('request');
        if ($requestedId) {
            $purchaseRequest = $availableRequests->firstWhere('id', $requestedId);
        }

        if (! $purchaseRequest) {
            $purchaseRequest = $availableRequests->first();
        } elseif (! $purchaseRequest->relationLoaded('items')) {
            $purchaseRequest->load('items');
        }

        $items = $purchaseRequest?->items ?? collect();
        $summary = $this->buildSummary($items);

        return view('admin.goods-receipt', [
            'purchaseRequest' => $purchaseRequest,
            'availableRequests' => $availableRequests,
            'items' => $items,
            'summary' => $summary,
        ]);
    }

    public function store(Request $request, PurchaseRequest $purchaseRequest)
    {
        $validated = $request->validate([
            'items' => ['required', 'array'],
            'items.*.qty_received' => ['required', 'integer', 'min:0'],
        ]);

        $shouldFinalize = $request->input('action') === 'confirm';

        DB::transaction(function () use ($validated, $purchaseRequest, $shouldFinalize) {
            $purchaseRequest->load('items.barang');

            foreach ($purchaseRequest->items as $item) {
                if (! array_key_exists($item->id, $validated['items'])) {
                    continue;
                }

                $newReceived = (int) $validated['items'][$item->id]['qty_received'];
                $delta = $newReceived - $item->qty_received;

                $item->update([
                    'qty_received' => $newReceived,
                ]);

                if ($delta === 0 || ! $item->barang) {
                    continue;
                }

                if ($delta > 0) {
                    $item->barang->increment('stok', $delta);
                } else {
                    $item->barang->decrement('stok', abs($delta));
                }
            }

            $purchaseRequest->refresh()->load('items');

            $allReceived = $purchaseRequest->items->every(function ($item) {
                return $item->qty_received >= $item->qty_requested;
            });

            $anyReceived = $purchaseRequest->items->contains(function ($item) {
                return $item->qty_received > 0;
            });

            if ($shouldFinalize) {
                $purchaseRequest->update([
                    'status' => $allReceived ? 'received' : ($anyReceived ? 'partial' : 'approved'),
                    'received_at' => $allReceived ? now() : null,
                ]);
            }
        });

        return redirect()->route('goods-receipt', ['purchaseRequest' => $purchaseRequest->id])
            ->with('success', 'Goods receipt berhasil disimpan.');
    }

    /**
     * @param  Collection<int, RequestItem>  $items
     * @return array<string, int>
     */
    private function buildSummary(Collection $items): array
    {
        $matched = $items->filter(function ($item) {
            return $item->qty_received === $item->qty_requested;
        })->count();

        $discrepancies = $items->count() - $matched;

        return [
            'matched' => $matched,
            'discrepancies' => $discrepancies,
        ];
    }
}
