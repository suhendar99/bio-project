<?php

use Illuminate\Database\Seeder;
use App\SetKirim;
use Faker\Factory as Faker;

class SetkirimSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SetKirim::create([
        	'id_operator' => 1,
        	'status_kirim' => 'daily',
        	'waktu_kirim' => date("h:i:s"),
        ]);
    }
}
