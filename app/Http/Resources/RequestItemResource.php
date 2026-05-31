<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RequestItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'barang_id' => $this->barang_id,
            'nama_barang' => $this->nama_barang,
            'kode_barang' => $this->kode_barang,
            'qty_requested' => $this->qty_requested,
            'qty_received' => $this->qty_received,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
