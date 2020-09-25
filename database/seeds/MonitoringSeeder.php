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
    	for ($i=0; $i < 6; $i++) { 
    		# code...
	    	$ruangan = Ruangan::all();

	    	foreach ($ruangan as $r) {
		        Monitoring::create([
		        	'date' => date("Y-m-d"),
		        	'time' => date("h:i:s"),
		        	'suhu' => '30',
		        	'kelembapan' => '30',
		        	'tekanan' => '30',
		        	'perangkat_id' => 'Dc234Zz',
		        	'ruangan_id' => $r->id,
		        	'cvc' => '20',
		        	'vvc' => '20'
		        ]);
	    	}
    	}
    }
}
