<?php

use Illuminate\Database\Seeder;
use App\Laporan;
use Faker\Factory as Faker;

class SetlaporanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Laporan::create([
        	'header-img' => 'header',
        	'footer' => 'Biofarma'
        ]);
    }
}
