<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call(UserSeeder::class);

        $this->call(RuanganSeeder::class);

        $this->call(PerangkatSeeder::class);

        $this->call(MonitoringSeeder::class);

        $this->call(AktivasiperangkatSeeder::class);

        $this->call(LogalertSeeder::class);

        $this->call(SatuanSeeder::class);

        $this->call(SetappSeeder::class);

        $this->call(SetlaporanSeeder::class);

        $this->call(SetmqttSeeder::class);

        $this->call(KirimalarmSeeder::class);
    }
}
