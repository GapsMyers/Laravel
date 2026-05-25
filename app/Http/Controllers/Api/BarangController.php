<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BarangStoreRequest;
use App\Http\Requests\BarangUpdateRequest;
use App\Http\Resources\BarangResource;
use App\Models\Barang;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): AnonymousResourceCollection
    {
        $barangs = Barang::query()->latest()->paginate(15);

        return BarangResource::collection($barangs)->additional([
            'message' => 'OK',
            'errors' => null,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BarangStoreRequest $request): JsonResponse
    {
        $barang = Barang::query()->create($request->validated());

        return (new BarangResource($barang))
            ->additional([
                'message' => 'Created',
                'errors' => null,
            ])
            ->response()
            ->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Barang $barang): BarangResource
    {
        return (new BarangResource($barang))->additional([
            'message' => 'OK',
            'errors' => null,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BarangUpdateRequest $request, Barang $barang): BarangResource
    {
        $barang->update($request->validated());

        return (new BarangResource($barang))->additional([
            'message' => 'Updated',
            'errors' => null,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barang $barang): JsonResponse
    {
        $barang->delete();

        return response()->json([
            'message' => 'Deleted',
            'data' => null,
            'errors' => null,
        ]);
    }
}
