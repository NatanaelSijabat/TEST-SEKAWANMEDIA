<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Faker\Factory as FakerFactory;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = FakerFactory::create();

        $users = [
            [
                'role_users_id' => 1,
                'employees_id' => 19,
                'email' => 'admin@mail.com',
                'password' => Hash::make("1234567890"),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'role_users_id' => 2,
                'employees_id' => 1,
                'email' => "manager@mail.com",
                'password' => Hash::make("1234567890"),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'role_users_id' => 2,
                'employees_id' => 2,
                'email' => $faker->email,
                'password' => Hash::make("1234567890"),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'role_users_id' => 2,
                'employees_id' => 3,
                'email' => $faker->email,
                'password' => Hash::make("1234567890"),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'role_users_id' => 2,
                'employees_id' => 4,
                'email' => $faker->email,
                'password' => Hash::make("1234567890"),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'role_users_id' => 2,
                'employees_id' => 5,
                'email' => $faker->email,
                'password' => Hash::make("1234567890"),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'role_users_id' => 2,
                'employees_id' => 6,
                'email' => $faker->email,
                'password' => Hash::make("1234567890"),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'role_users_id' => 2,
                'employees_id' => 7,
                'email' => "supervisor@mail.com",
                'password' => Hash::make("1234567890"),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'role_users_id' => 2,
                'employees_id' => 8,
                'email' => $faker->email,
                'password' => Hash::make("1234567890"),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'role_users_id' => 2,
                'employees_id' => 9,
                'email' => $faker->email,
                'password' => Hash::make("1234567890"),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'role_users_id' => 2,
                'employees_id' => 10,
                'email' => $faker->email,
                'password' => Hash::make("1234567890"),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'role_users_id' => 2,
                'employees_id' => 11,
                'email' => $faker->email,
                'password' => Hash::make("1234567890"),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'role_users_id' => 2,
                'employees_id' => 12,
                'email' => $faker->email,
                'password' => Hash::make("1234567890"),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ];
        DB::table('users')->delete();
        DB::table('users')->insert($users);
    }
}
