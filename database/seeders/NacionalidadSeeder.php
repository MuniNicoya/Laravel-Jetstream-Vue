<?php

namespace Database\Seeders;

use App\Models\Nacionalidad;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NacionalidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      // Specify the path to your CSV file
      $csvFile = __DIR__ . '/CICAC-Nacionalidad.csv';

      // Open the CSV file for reading
      $csvData = fopen($csvFile, 'r');

      // Skip the header row
      fgetcsv($csvData);

      // Read and insert each line from the CSV
      while (($csvRow = fgetcsv($csvData)) !== false) {
          // Map CSV columns to database columns
          $attributes = [
            'codPaisNacimiento' => $csvRow[0],
            'descripcion' => $csvRow[1]
        ];

          // Insert data into the database
          Nacionalidad::factory()->create($attributes);
      }

      // Close the CSV file
      fclose($csvData);
  }
}
