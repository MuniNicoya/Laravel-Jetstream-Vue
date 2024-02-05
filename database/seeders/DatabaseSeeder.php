<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\User::factory()->create([
            'name' => 'E. Chongkan',
            //'type' => 'residential',
            'email' => 'e.chongkan@gmail.com',
            'password' => Hash::make('12345'),
        ]);

        $this->call([
            //VendorSeeder::class,
            //SupplySeeder::class,

            // CountrySeeder::class,
            // StateSeeder::class,
            // CantonSeeder::class,
            // DistelectSeeder::class,

            //RoleSeeder::class,
            //PermissionSeeder::class
            // roles permission pivot
            // roles user pivot






            //

        ]);
    }
}
