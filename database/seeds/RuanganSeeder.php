<?php

use Illuminate\Database\Seeder;
use App\Ruangan;
use Faker\Factory as Faker;

class RuanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ruangan::create([
        	'nama' => 'Airlock',
        	'smax' => '25',
        	'smin' => '16',
        	'kmax' => '55',
        	'kmin' => '45',
        	'tmax' => '0',
        	'tmin' => '-10',
        ]);

        Ruangan::create([
        	'nama' => 'Vestibule',
        	'smax' => '25',
        	'smin' => '16',
        	'kmax' => '55',
        	'kmin' => '45',
        	'tmax' => '10',
        	'tmin' => '0',
        ]);

        Ruangan::create([
        	'nama' => 'Dressing',
        	'smax' => '25',
        	'smin' => '16',
        	'kmax' => '55',
        	'kmin' => '45',
        	'tmax' => '25',
        	'tmin' => '15',
        ]);

        Ruangan::create([
        	'nama' => 'Sample',
        	'smax' => '25',
        	'smin' => '16',
        	'kmax' => '55',
        	'kmin' => '45',
        	'tmax' => '25',
        	'tmin' => '15',
        ]);

        Ruangan::create([
        	'nama' => 'Uji',
        	'smax' => '25',
        	'smin' => '16',
        	'kmax' => '55',
        	'kmin' => '45',
        	'tmax' => '-20',
        	'tmin' => '-30',
        ]);

    }
}
