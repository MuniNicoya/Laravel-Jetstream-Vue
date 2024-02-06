<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CatalogoCuenta;

class CatalogoCuentaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Specify the path to your CSV file
        $csvFile = __DIR__ . '/CatalogoCuenta2024.csv';

        // Open the CSV file for reading
        $csvData = fopen($csvFile, 'r');

        // Skip the header row
        fgetcsv($csvData);

        // Read and insert each line from the CSV
        while (($csvRow = fgetcsv($csvData)) !== false) {
            // Map CSV columns to database columns
            $attributes = [
              'cuenta' => $csvRow[0],
              'descripcion' => $csvRow[1],
              'signo' => $csvRow[2],
              'nivel' => $csvRow[3],
              'vigencia' => $csvRow[4],
              'activa' => $csvRow[5],
              'tipo' => $csvRow[6],
              //-- 
              'type' => 0,
              'status' => 10,
              'team_id' => 0,

          ];

            // Insert data into the database
            CatalogoCuenta::factory()->create($attributes);
        }

        // Close the CSV file
        fclose($csvData);
    }
}
