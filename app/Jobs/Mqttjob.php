<?php

namespace App\Jobs;

use Salman\Mqtt\MqttClass\Mqtt;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class Mqttjob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $topic = "qwerty";
        Mqtt::ConnectAndSubscribe($topic, function($topic, $msg){
            echo "Msg Received: \n";
            echo "Topic: {$topic}\n\n";
            echo "\t$msg\n\n";
        });
    }
}
