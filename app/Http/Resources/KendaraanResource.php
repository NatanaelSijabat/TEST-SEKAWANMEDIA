<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class KendaraanResource extends JsonResource
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
            'name' => $this->name,
            'jenis' => $this->jenis ? [
                'name' => optional($this->jenis)->name
            ] : null,
            'type' => $this->type ? [
                'name' => optional($this->type)->name
            ] : null
        ];
    }
}
