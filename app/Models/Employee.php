<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = ['firstname', 'lastname', 'type_users_id', 'locations_id', 'employees_id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function location(): HasOne
    {
        return $this->hasOne(Locations::class, 'id', 'locations_id');
    }

    public function jabatan(): HasOne
    {
        return $this->hasOne(TypeUser::class, 'id', 'type_users_id');
    }

    public function atasan(): HasOne
    {
        return $this->hasOne(Employee::class, 'id', 'employees_id');
    }
}
