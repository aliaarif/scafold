<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {   
        $this->call([
            RolesAndPermissionSeeder::class,
            UserSeeder::class,
            VendorSeeder::class,
            CategorySeeder::class,
            ProductSeeder::class,
            BusinessSeeder::class,
            AddressSeeder::class,
            CardSeeder::class,
            PaymentMethodSeeder::class
        ]);
    }
}
