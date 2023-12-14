<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Hash;
use DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user  = User::create([
            'name' => 'Super Admin',
            'username' => 'super.admin',
            'email' => 'super.admin@example.com',
            'mobile' => '8005794205',
            'role' => 'super admin',
            'gender' => 'male',
            'birth_date' => '1987-08-14',
            'status' => 'active',
            'password' => Hash::make('password')
        ]);

        $user->assignRole('super admin');

    }
}
