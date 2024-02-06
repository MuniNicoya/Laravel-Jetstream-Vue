<?php

namespace Database\Seeders;

use App\Models\ActividadesEconomica;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ActividadesEconomicaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      // Specify the path to your CSV file
      $csvFile = __DIR__ . '/CICAC-ActividadesEconómicas.csv';

      // Open the CSV file for reading
      $csvData = fopen($csvFile, 'r');

      // Skip the header row
      fgetcsv($csvData);

      // Read and insert each line from the CSV
      while (($csvRow = fgetcsv($csvData)) !== false) {
          // Map CSV columns to database columns
          $attributes = [
            'codSubClase' => $csvRow[0],
            'descripcion' => $csvRow[1],
            'is_active' => $csvRow[2]
        ];

          // Insert data into the database
          ActividadesEconomica::factory()->create($attributes);
      }

      // Close the CSV file
      fclose($csvData);
  }
}
