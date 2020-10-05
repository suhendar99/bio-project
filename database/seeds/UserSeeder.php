<?php

use Illuminate\Database\Seeder;
use App\User;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker::create('id_ID');

        // $foto = "upload/foto/user/".time()."_".$faker->unique()->word.'.png';

        // Storage::disk('public')->copy('upload/foto/user/1595427497/avatar.png', $foto);

        User::create([
        	"name" => "Admin",
        	"email" => "admin@makerindo.com",
        	"nik" => "12341212",
            "level" => "Admin",
        	"password" => Hash::make("12341234")
        ]);

        User::create([
            "name" => "Operator",
            "email" => "operator@makerindo.com",
            "nik" => "9937323",
            "level" => "Operator",
            "password" => Hash::make("09870987"),
        ]);

        User::create([
            "name" => "Operator Biofarma",
            "email" => "operator.biofarma@gmail.com",
            "nik" => "123456",
            "level" => "Operator",
            "password" => Hash::make("123456"),
        ]);
    }
}
