<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AllResource extends JsonResource
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
            'lokasi' => $this->name,
            'kendaraan' => $this->kendaraan->map(function ($kendaraan) {
                return [
                    'id' => $kendaraan->id,
                    'nama' => $kendaraan->name,
                    'jenis' => $kendaraan->jenis_kendaraans_id
                ];
            }),
        ];
    }
}
