<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class KendaraanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => "Kendaraan 1",
                'jenis_kendaraans_id' => 1,
                'type_kendaraans_id' => 1,
                'locations_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => "Kendaraan 2",
                'jenis_kendaraans_id' => 1,
                'type_kendaraans_id' => 2,
                'locations_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => "Kendaraan 3",
                'jenis_kendaraans_id' => 2,
                'type_kendaraans_id' => 2,
                'locations_id' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => "Kendaraan 4",
                'jenis_kendaraans_id' => 2,
                'type_kendaraans_id' => 1,
                'locations_id' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => "Kendaraan 5",
                'jenis_kendaraans_id' => 2,
                'type_kendaraans_id' => 1,
                'locations_id' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => "Kendaraan 6",
                'jenis_kendaraans_id' => 1,
                'type_kendaraans_id' => 1,
                'locations_id' => 6,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ];
        DB::table('kendaraans')->delete();
        DB::table('kendaraans')->insert($data);
    }
}
