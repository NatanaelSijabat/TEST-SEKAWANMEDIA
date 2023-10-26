<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'kendaraans_id' => '1',
                'locations_id' => '1',
                'karyawan_id' => '13',
                'supervisor_id' => '7',
                'manager_id' => '1',
                'status_supervisor' => '1',
                'status_manager' => '1',
                'tanggal_pemakaian' => '2000-01-01',
                'tanggal_pengembalian' => '2000-02-02',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ];
        DB::table('orders')->delete();
        DB::table('orders')->insert($data);
    }
}
