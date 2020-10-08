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
    		# code...
    	for ($i=0; $i < 500; $i++) { 
    		$data[] = [
	        	'date' => date("Y-m-d"),
	        	'time' => date("h:i:s"),
	        	'suhu' => rand(0, 45),
	        	'kelembapan' => rand(0, 45),
	        	'tekanan' => rand(0, 45),
	        	'perangkat_id' => 'Dc234Zz',
	        	'ruangan_id' => 1,
	        	'cvc' => '20',
	        	'vvc' => '20'
	        ];
	    	
    	}

    	$chunks = array_chunk($data, 500);

    	foreach ($chunks as $chunk) {
	        Monitoring::insert($chunk);
    	}
    }
}
