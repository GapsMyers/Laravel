<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AuditLogResource extends JsonResource
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
            'action' => $this->action,
            'title' => $this->title,
            'description' => $this->description,
            'category' => $this->category,
            'level' => $this->level,
            'actor_name' => $this->actor_name,
            'ip_address' => $this->ip_address,
            'entity_type' => $this->entity_type,
            'entity_id' => $this->entity_id,
            'metadata' => $this->metadata,
            'created_at' => $this->created_at,
        ];
    }
}
