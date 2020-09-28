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
        subscribe_mqtt($topic);

    }

}
