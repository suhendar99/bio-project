<?php

use Illuminate\Database\Seeder;
use App\Mqtt;
use Faker\Factory as Faker;

class SetmqttSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		Mqtt::create([
			'url_broker' => 'm15.cloudmqtt.com',
			'username' => 'aqeiblzz',
			'password' => 'SMXz9EyJcRmB',
			'topic' => 'qwerty',
			'qos' => '0',
			'keep_alive' => 1,
		]);
    }
}
