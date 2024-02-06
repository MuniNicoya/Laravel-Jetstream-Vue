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
              'sign' => $csvRow[2],
              'level' => $csvRow[3],
              'vigencia' => $csvRow[4],
              'status' => 10,
              'type' => 0,
              'account_id' => 0,
              'created_by' => 0,
          ];

            // Insert data into the database
            CatalogoCuenta::factory()->create($attributes);
        }

        // Close the CSV file
        fclose($csvData);
    }
}
