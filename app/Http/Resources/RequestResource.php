<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RequestResource extends JsonResource
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
            'pr_number' => $this->pr_number,
            'department' => $this->department,
            'requester_name' => $this->requester_name,
            'status' => $this->status,
            'notes' => $this->notes,
            'requested_at' => $this->requested_at,
            'approved_at' => $this->approved_at,
            'rejected_at' => $this->rejected_at,
            'received_at' => $this->received_at,
            'items' => RequestItemResource::collection($this->whenLoaded('items')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
