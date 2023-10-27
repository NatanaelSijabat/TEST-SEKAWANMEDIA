<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class Locations extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }

    public function kendaraan(): HasMany
    {
        return $this->hasMany(Kendaraan::class);
    }


    public function employe(): HasMany
    {
        return $this->hasMany(Employee::class);
    }
}
