<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin',
                'role_users_id' => 1,
                'type_users_id' => 4,
                'users_id' => null,
                'email' => 'admin@mail.com',
                'password' => Hash::make("1234567890"),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Atasan 1',
                'role_users_id' => 2,
                'type_users_id' => 2,
                'users_id' => null,
                'email' => 'Atasan1@mail.com',
                'password' => Hash::make("1234567890"),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Atasan 2',
                'role_users_id' => 2,
                'type_users_id' => 2,
                'users_id' => null,
                'email' => 'Atasan2@mail.com',
                'password' => Hash::make("1234567890"),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Karyawan 1',
                'role_users_id' => 2,
                'type_users_id' => 1,
                'users_id' => 2,
                'email' => 'karyawan1@mail.com',
                'password' => Hash::make("1234567890"),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Karyawan 2',
                'role_users_id' => 2,
                'type_users_id' => 1,
                'users_id' => 3,
                'email' => 'karyawan2@mail.com',
                'password' => Hash::make("1234567890"),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Pengelola Kendaraan',
                'role_users_id' => 2,
                'type_users_id' => 3,
                'users_id' => null,
                'email' => 'pengelola@mail.com',
                'password' => Hash::make("1234567890"),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ];
        DB::table('users')->delete();
        DB::table('users')->insert($users);
    }
}
