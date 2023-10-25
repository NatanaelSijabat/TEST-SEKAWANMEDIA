<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;


class Kendaraan extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'jenis_kendaraans_id', 'type_kendaraans_id'];

    public function jenis(): HasOne
    {
        return $this->hasOne(JenisKendaraan::class, 'id', 'jenis_kendaraans_id');
    }

    public function type(): HasOne
    {
        return $this->hasOne(TypeKendaraan::class, 'id', 'type_kendaraans_id');
    }
}
