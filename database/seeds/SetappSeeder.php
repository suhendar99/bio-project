<?php

use Illuminate\Database\Seeder;
use App\Setapp;
use Faker\Factory as Faker;

class SetappSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setapp::create([
        	'nama_apps' => 'Biofarma',
        	'overview' => 'Biofarma',
        	'tab' => 'Biofarma'
        ]);
    }
}
