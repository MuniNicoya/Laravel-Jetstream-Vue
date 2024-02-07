<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        $user = \App\Models\User::factory()->withPersonalTeam()->create([
            //'type' => 'fisico',
            'name' => 'Attestto System',
            'email' => 'system@attestto.net',
            'password' => Hash::make('12345'), 
        ]);
      
      //\App\Models\Team::factory()->createOne();
      //$user = \App\Models\User::factory()->withPersonalTeam()->create();
       




        $this->call([
             //CatalogoCuentaSeeder::class, 
             //NacionalidadSeeder::class,
             //ActividadesEconomicaSeeder::class,
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
