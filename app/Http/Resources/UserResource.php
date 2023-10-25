<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'roles' => $this->role ? [
                'name' => optional($this->role)->name,
            ] : null,
            'type' => $this->type ? [
                'name' => optional($this->type)->name,
            ] : null,
            'atasan' => $this->atasan->map(function ($atasan) {
                return ['name' => $atasan->name];
            }),

        ];
    }
}
