<?php
error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
// use Mqtt;
use App\Monitoring;

if (!function_exists('subscribe_mqtt') ){
    function subscribe_mqtt($topic)
    {
        \Mqtt::ConnectAndSubscribe($topic, function($topic, $msg){
            
            echo "Msg Received: \n";
            echo "Topic: {$topic}\n\n";
            echo "\t$msg\n\n";
            $datamsg = json_decode($msg);
            
            Monitoring::create([
                'suhu' => $datamsg->suhu,
                'kelembapan' => $datamsg->kelembapan,
                'tekanan' => $datamsg->tekanan,
                'alarm' => $datamsg->alarm,
                'perangkat_id' => $datamsg->perangkat_id,
                'ruangan_id' => $datamsg->ruangan_id,
                'cvc' => $datamsg->cvc,
                'vvc' => $datamsg->vvc,
                'time' => date('H:i:s'),
                'date' => date('Y-m-d')
            ]);
            

        });
    }
}




