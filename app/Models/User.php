<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'role_users_id',
        'employees_id',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'password' => 'hashed',
    ];


    public function atasan(): HasMany
    {
        return $this->hasMany(User::class, 'id', 'users_id');
    }


    public function role(): HasMany
    {
        return $this->hasMany(RoleUser::class, 'id', 'role_users_id');
    }

    public function type(): HasOne
    {
        return $this->hasOne(TypeUser::class, 'id', 'type_users_id');
    }

    public function employee(): HasOne
    {
        return $this->hasOne(Employee::class, 'id', 'employees_id');
    }

    public function locations()
    {
        return $this->hasManyThrough(Employee::class, Location::class);
    }
}
