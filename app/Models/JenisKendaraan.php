<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class JenisKendaraan extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'id'];

    public function kendaraan(): HasMany
    {
        return $this->hasMany(Kendaraan::class);
    }
}
