<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Faker\Factory as FakerFactory;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = FakerFactory::create();

        $data = [
            [
                "firstname" => $faker->name,
                "lastname" => $faker->name,
                "type_users_id" => 3,
                "locations_id" => 1,
                "employees_id" => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                "firstname" => $faker->name,
                "lastname" => $faker->name,
                "type_users_id" => 3,
                "locations_id" => 2,
                "employees_id" => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                "firstname" => $faker->name,
                "lastname" => $faker->name,
                "type_users_id" => 3,
                "locations_id" => 3,
                "employees_id" => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                "firstname" => $faker->name,
                "lastname" => $faker->name,
                "type_users_id" => 3,
                "locations_id" => 4,
                "employees_id" => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                "firstname" => $faker->name,
                "lastname" => $faker->name,
                "type_users_id" => 3,
                "locations_id" => 5,
                "employees_id" => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                "firstname" => $faker->name,
                "lastname" => $faker->name,
                "type_users_id" => 3,
                "locations_id" => 6,
                "employees_id" => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                "firstname" => $faker->name,
                "lastname" => $faker->name,
                "type_users_id" => 2,
                "locations_id" => 1,
                "employees_id" => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                "firstname" => $faker->name,
                "lastname" => $faker->name,
                "type_users_id" => 2,
                "locations_id" => 2,
                "employees_id" => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                "firstname" => $faker->name,
                "lastname" => $faker->name,
                "type_users_id" => 2,
                "locations_id" => 3,
                "employees_id" => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                "firstname" => $faker->name,
                "lastname" => $faker->name,
                "type_users_id" => 2,
                "locations_id" => 4,
                "employees_id" => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                "firstname" => $faker->name,
                "lastname" => $faker->name,
                "type_users_id" => 2,
                "locations_id" => 5,
                "employees_id" => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                "firstname" => $faker->name,
                "lastname" => $faker->name,
                "type_users_id" => 2,
                "locations_id" => 6,
                "employees_id" => 6,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                "firstname" => $faker->name,
                "lastname" => $faker->name,
                "type_users_id" => 1,
                "locations_id" => 1,
                "employees_id" => 7,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                "firstname" => $faker->name,
                "lastname" => $faker->name,
                "type_users_id" => 1,
                "locations_id" => 2,
                "employees_id" => 8,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                "firstname" => $faker->name,
                "lastname" => $faker->name,
                "type_users_id" => 1,
                "locations_id" => 3,
                "employees_id" => 9,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                "firstname" => $faker->name,
                "lastname" => $faker->name,
                "type_users_id" => 1,
                "locations_id" => 4,
                "employees_id" => 10,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                "firstname" => $faker->name,
                "lastname" => $faker->name,
                "type_users_id" => 1,
                "locations_id" => 5,
                "employees_id" => 11,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                "firstname" => $faker->name,
                "lastname" => $faker->name,
                "type_users_id" => 1,
                "locations_id" => 6,
                "employees_id" => 12,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                "firstname" => $faker->name,
                "lastname" => $faker->name,
                "type_users_id" => 4,
                "locations_id" => 1,
                "employees_id" => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ];

        DB::table('employees')->delete();
        DB::table('employees')->insert($data);
    }
}
