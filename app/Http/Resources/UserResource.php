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
            'email' => $this->email,
            'role' => $this->role->map(function ($role) {
                return [
                    'name' => $role->name,
                ];
            }),
            'employee' => $this->employee ? [
                'fullname' => optional($this->employee)->firstname . ' ' . optional($this->employee)->lastname,
            ] : null
        ];
    }
}
