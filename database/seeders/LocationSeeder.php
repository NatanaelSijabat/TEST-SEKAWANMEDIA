<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                "name" => "Location 1",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                "name" => "Location 2",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                "name" => "Location 3",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                "name" => "Location 4",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                "name" => "Location 5",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                "name" => "Location 6",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ];
        DB::table('locations')->delete();
        DB::table('locations')->insert($data);
    }
}
