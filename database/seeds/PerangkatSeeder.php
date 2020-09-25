<?php

use Illuminate\Database\Seeder;
use App\Perangkat;
use Faker\Factory as Faker;

class PerangkatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Perangkat::create([
    		'no_seri' => 'Dc234Zz',
    		'status' => 'aktif'
    	]);
    }
}
