<?php

use Illuminate\Database\Seeder;
use App\Satuan;
use Faker\Factory as Faker;

class SatuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Satuan::create([
        	'parameter' => 'Suhu',
        	'satuan' => '°C',
        ]);

        Satuan::create([
        	'parameter' => 'Kelembapan',
        	'satuan' => 'Rh',
        ]);

        Satuan::create([
        	'parameter' => 'Tekanan',
        	'satuan' => 'Pa',
        ]);
    }
}
