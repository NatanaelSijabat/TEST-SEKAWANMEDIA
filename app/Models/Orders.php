<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $fillable = ['kendaraans_id', 'locations_id', 'karyawan_id', 'supervisor_id', 'manager_id', 'status_manager', 'status_supervisor', 'tanggal_pemakaian', 'tanggal_pengembalian'];
}
