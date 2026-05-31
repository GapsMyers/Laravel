<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\RequestResource;
use App\Models\Request as PurchaseRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ApprovalController extends Controller
{
    public function index(Request $request): AnonymousResourceCollection
    {
        $statuses = collect(explode(',', (string) $request->query('status')))
            ->map(fn (string $status) => trim($status))
            ->filter();

        $query = PurchaseRequest::query()->with('items');

        if ($statuses->isNotEmpty()) {
            $query->whereIn('status', $statuses->all());
        }

        $requests = $query->latest()->paginate(15);

        return RequestResource::collection($requests)->additional([
            'message' => 'OK',
            'errors' => null,
        ]);
    }

    public function show(PurchaseRequest $purchaseRequest): RequestResource
    {
        $purchaseRequest->load('items');

        return (new RequestResource($purchaseRequest))->additional([
            'message' => 'OK',
            'errors' => null,
        ]);
    }
}
