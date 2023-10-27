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
            'fullname' =>  optional($this->employee)->firstname . ' ' . optional($this->employee)->lastname,
            'role' => $this->role->map(function ($role) {
                return $role->name;
            })->implode(', ')
        ];
    }
}
