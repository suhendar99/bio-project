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
        	'smax' => '40',
        	'smin' => '0',
        	'kmax' => '100',
        	'kmin' => '0',
        	'tmax' => '50',
        	'tmin' => '0',
        ]);

        Ruangan::create([
        	'nama' => 'Vestibule',
        	'smax' => '40',
        	'smin' => '0',
        	'kmax' => '100',
        	'kmin' => '0',
        	'tmax' => '50',
        	'tmin' => '0',
        ]);

        Ruangan::create([
        	'nama' => 'Dressing',
        	'smax' => '40',
        	'smin' => '0',
        	'kmax' => '100',
        	'kmin' => '0',
        	'tmax' => '50',
        	'tmin' => '0',
        ]);

        Ruangan::create([
        	'nama' => 'Sample',
        	'smax' => '40',
        	'smin' => '0',
        	'kmax' => '100',
        	'kmin' => '0',
        	'tmax' => '50',
        	'tmin' => '0',
        ]);

        Ruangan::create([
        	'nama' => 'Uji',
        	'smax' => '40',
        	'smin' => '0',
        	'kmax' => '100',
        	'kmin' => '0',
        	'tmax' => '50',
        	'tmin' => '0',
        ]);

    }
}
