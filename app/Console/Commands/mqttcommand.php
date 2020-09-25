<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Helper\Mqttphp;
use App\Monitoring;
use App\Laporan;
use App\KirimAlarm;
use App\Ruangan;
use App\Operator;
use App\Log_alert;
use App\Mail\sendEmail;
use App\Mail\VerifyMail;
use App\Mqtt;
use Telegram\Bot\Laravel\Facades\Telegram;
use Telegram\Bot\FileUpload\InputFile;
use Illuminate\Support\Facades\Mail;

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
        $dbMqtt = Mqtt::find(1);
        $topic = $dbMqtt->topic;
        // subscribe_mqtt('123123');

        // require('../db/phpMqtt.php');


        $server = '103.146.202.171';     // change if necessary
        $port = 1883;                     // change if necessary
        $username = $dbMqtt->username;                   // set your username
        $password = $dbMqtt->password;                   // set your password
        $client_id = 'ws858463968573494659'; // make sure this is unique for connecting to sever - you could use uniqid()

        $mqtt = new Mqttphp($server, $port, $client_id);
        if(!$mqtt->connect(true, NULL, $username, $password)) {
            exit(1);
        }

        $mqtt->debug = true;

        $topics['test'] = array(
            'qos' => 0, 
            'function' => function ($topic, $msg){
                echo 'Msg Recieved: ' . date('r') . "\n";
                echo "Topic: {$topic}\n\n";
                echo "\t$msg\n\n";

                $payload = json_decode($msg);

                $jsonobj = '[
                    {
                        "suhu" : '.$payload->temp_airlock.',
                        "kelembapan" : '.$payload->rh_airlock.',
                        "tekanan" : '.$payload->scaling_airlock.',
                        "perangkat_id" : "Dc234Zz",
                        "ruangan_id" : 1,
                        "alarm" : 0,
                        "cvc" : '.$payload->cvc_airlock.',
                        "vvc" : '.$payload->vvc_airlock.'
                    },
                    {
                        "suhu" : '.$payload->temp_vest.',
                        "kelembapan" : '.$payload->rh_vest.',
                        "tekanan" : '.$payload->scaling_vest.',
                        "perangkat_id" : "Dc234Zz",
                        "ruangan_id" : 2,
                        "alarm" : 0,
                        "cvc" : '.$payload->cvc_vest.',
                        "vvc" : '.$payload->vvc_vest.'
                    },
                    {
                        "suhu" : '.$payload->temp_dressing.',
                        "kelembapan" : '.$payload->rh_dressing.',
                        "tekanan" : '.$payload->scaling_dressing.',
                        "perangkat_id" : "Dc234Zz",
                        "ruangan_id" : 3,
                        "alarm" : 0,
                        "cvc" : '.$payload->cvc_dressing.',
                        "vvc" : '.$payload->vvc_dressing.'
                    },
                    {
                        "suhu" : '.$payload->temp_sample.',
                        "kelembapan" : '.$payload->rh_sample.',
                        "tekanan" : '.$payload->scaling_sample.',
                        "perangkat_id" : "Dc234Zz",
                        "ruangan_id" : 4,
                        "alarm" : 0,
                        "cvc" : '.$payload->cvc_sample.',
                        "vvc" : '.$payload->vvc_sample.'
                    },
                    {
                        "suhu" : '.$payload->temp_uji.',
                        "kelembapan" : '.$payload->rh_uji.',
                        "tekanan" : '.$payload->scaling_uji.',
                        "perangkat_id" : "Dc234Zz",
                        "ruangan_id" : 5,
                        "alarm" : 0,
                        "cvc" : '.$payload->cvc_uji.',
                        "vvc" : '.$payload->vvc_uji.'
                    }
                ]';

                $datas = json_decode($jsonobj);

                foreach ($datas as $data) {
                    $alert = 0;

                    $monitor = Monitoring::create([
                        'suhu' => $data->suhu,
                        'kelembapan' => $data->kelembapan,
                        'tekanan' => $data->tekanan,
                        'perangkat_id' => $data->perangkat_id,
                        'ruangan_id' => $data->ruangan_id,
                        'cvc' => $data->cvc,
                        'vvc' => $data->vvc,
                        'time' => date('H:i:s'),
                        'date' => date('Y-m-d')
                    ]);

                    $ruang = Ruangan::where('id', $data->ruangan_id)->first();
                    $smax = $ruang->smax;
                    $smin = $ruang->smin;

                    $kmax = $ruang->kmax;
                    $kmin = $ruang->kmin;

                    $tmax = $ruang->tmax;
                    $tmin = $ruang->tmin;

                    $sendAlert = [];

                    if ($data->suhu > $smax) {
                        $sendAlert[] = "Suhu: ".$data->suhu.'C lebih tinggi dari '.$smax."C\nRuangan: ".$ruang->nama;
                        $log = new Log_alert;
                        $log->status = 'High presure';
                        $log->keterangan = $data->suhu.'C lebih tinggi dari '.$smax.'C';
                        $log->monitoring_id = $monitor->id;
                        $log->time = date('H:i:s');
                        $log->save();
                    }

                    if($data->suhu < $smin){
                        $sendAlert[] = "Suhu: ".$data->suhu.'C lebih rendah dari '.$smin."C\nRuangan: ".$ruang->nama;
                        $log = new Log_alert;
                        $log->status = 'Low presure';
                        $log->keterangan = $data->suhu.'C lebih rendah dari '.$smin.'C';
                        $log->monitoring_id = $monitor->id;
                        $log->time = date('H:i:s');
                        $log->save();
                    }

                    if($data->kelembapan > $kmax){
                        $sendAlert[] = "Kelembapan: ".$data->kelembapan.'% lebih tinggi dari '.$kmax."%\nRuangan: ".$ruang->nama;
                        $log = new Log_alert;
                        $log->status = 'High presure';
                        $log->keterangan = $data->kelembapan.'% lebih tinggi dari '.$kmax.'%';
                        $log->monitoring_id = $monitor->id;
                        $log->time = date('H:i:s');
                        $log->save();
                    }

                    if($data->kelembapan < $kmin){
                        $sendAlert[] = "Kelembapan: ".$data->kelembapan.'% lebih rendah dari '.$kmin."%\nRuangan: ".$ruang->nama;
                        $log = new Log_alert;
                        $log->status = 'Low presure';
                        $log->keterangan = $data->kelembapan.'% lebih rendah dari '.$kmin.'%';
                        $log->monitoring_id = $monitor->id;
                        $log->time = date('H:i:s');
                        $log->save();
                    }

                    if($data->tekanan > $tmax){
                        $sendAlert[] = "Tekanan: ".$data->tekanan.'Pa lebih tinggi dari '.$tmax."Pa\nRuangan: ".$ruang->nama;
                        $log = new Log_alert;
                        $log->status = 'High presure';
                        $log->keterangan = $data->tekanan.'Pa lebih tinggi dari '.$tmax.'Pa';
                        $log->monitoring_id = $monitor->id;
                        $log->time = date('H:i:s');
                        $log->save();
                    }

                    if($data->tekanan < $tmin){
                        $sendAlert[] = "Tekanan: ".$data->tekanan.'Pa lebih rendah dari '.$tmin."Pa\nRuangan: ".$ruang->nama;
                        $log = new Log_alert;
                        $log->status = 'Low presure';
                        $log->keterangan = $data->tekanan.'Pa lebih rendah dari '.$tmin.'Pa';
                        $log->monitoring_id = $monitor->id;
                        $log->time = date('H:i:s');
                        $log->save();
                    }


                    if (count($sendAlert) > 0) {
                        $toMail = KirimAlarm::all();
                        foreach ($toMail as $send) {
                            echo $send->id_operator."\n";
                            Mail::to(Operator::where('id', $send->id_operator)->first())->send(new sendEmail($send->custom_teks, $sendAlert));
                        }

                        foreach ($sendAlert as $f) {
                            $text = "Alert!!!\n"
                            . "<b>Message: </b>\n"
                            . $f;

                            Telegram::sendMessage([
                                'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001237937318'),
                                'parse_mode' => 'HTML',
                                'text' => $text
                            ]);
                        }
                    
                    }
                }
        });
        $mqtt->subscribe($topics, 0);

        while($mqtt->proc()) {

        }

        $mqtt->close();

        

    }

}
