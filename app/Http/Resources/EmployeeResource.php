<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
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
            'fullname' => $this->firstname . ' ' . $this->lastname,
            'jabatan' => optional($this->jabatan)->name,
            'atasan' => $this->atasan ?
                (optional($this->atasan)->firstname . ' ' . optional($this->atasan)->firstname)
                : null,
            'lokasi' => optional($this->location)->name,
        ];
    }
}
