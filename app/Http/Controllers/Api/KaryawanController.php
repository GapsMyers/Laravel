<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\KaryawanStoreRequest;
use App\Http\Requests\KaryawanUpdateRequest;
use App\Http\Resources\KaryawanResource;
use App\Models\Karyawan;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): AnonymousResourceCollection
    {
        $karyawans = Karyawan::query()->latest()->paginate(15);

        return KaryawanResource::collection($karyawans)->additional([
            'message' => 'OK',
            'errors' => null,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(KaryawanStoreRequest $request): JsonResponse
    {
        $karyawan = Karyawan::query()->create($request->validated());

        return (new KaryawanResource($karyawan))
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
    public function show(Karyawan $karyawan): KaryawanResource
    {
        return (new KaryawanResource($karyawan))->additional([
            'message' => 'OK',
            'errors' => null,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(KaryawanUpdateRequest $request, Karyawan $karyawan): KaryawanResource
    {
        $karyawan->update($request->validated());

        return (new KaryawanResource($karyawan))->additional([
            'message' => 'Updated',
            'errors' => null,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Karyawan $karyawan): JsonResponse
    {
        $karyawan->delete();

        return response()->json([
            'message' => 'Deleted',
            'data' => null,
            'errors' => null,
        ]);
    }
}
