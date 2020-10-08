<?php

use Illuminate\Database\Seeder;
use App\Monitoring;
use App\Ruangan;
use Faker\Factory as Faker;

class MonitoringSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$data = [];
    	$ruangan = Ruangan::all();

    	for ($i=0; $i < 5000; $i++) { 
    		$data[] = [
	        	'date' => date("Y-m-d"),
	        	'time' => date("h:i:s"),
	        	'suhu' => rand(20,30),
	        	'kelembapan' => rand(-10,10),
	        	'tekanan' => rand(1,10),
	        	'perangkat_id' => 'Dc234Zz',
	        	'ruangan_id' => rand(1,5),
	        	'cvc' => '20',
	        	'vvc' => '20'
	        ];
    	}

    	$chunks = array_chunk($data, 5000);

    	foreach ($chunks as $chunk) {
    		Monitoring::insert($chunk);
    	}
    }
}
