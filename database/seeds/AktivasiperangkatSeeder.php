<?php

use Illuminate\Database\Seeder;
use App\AktivasiPerangkat;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class AktivasiperangkatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AktivasiPerangkat::create([
        	'id_perangkat' => 1,
        	'id_ruangan' => 1,
        ]);
    }
}
