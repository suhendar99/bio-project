<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class mqttcommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mqtt:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Jadi Subscriber';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $topic = "qwerty";
        subscribe_mqtt($topic);
    }
}
