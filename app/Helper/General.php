<?php
error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
// use Mqtt;
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

        $ruang = Ruangan::where('id', $datamsg->ruangan_id)->first();
        $smax = $ruang->smax;
        $smin = $ruang->smin;

        $kmax = $ruang->kmax;
        $kmin = $ruang->kmin;

        $tmax = $ruang->tmax;
        $tmin = $ruang->tmin;

        $sendAlert = [];

        if ($datamsg->suhu > $smax) {
            $sendAlert[] = "Suhu: ".$datamsg->suhu.'C lebih tinggi dari '.$smax.'C';
            // $log = new Log_alert;
            // $log->status = 'High presure';
            // $log->keterangan = $datamsg->suhu.'C lebih tinggi dari '.$smax.'C';
            // $log->monitoring_id = $data->id;
            // $log->time = date('H:i:s');
            // $log->save();
        }

        if($datamsg->suhu < $smin){
            $sendAlert[] = "Suhu: ".$datamsg->suhu.'C lebih rendah dari '.$smin.'C';
            // $log = new Log_alert;
            // $log->status = 'Low presure';
            // $log->keterangan = $datamsg->suhu.'C lebih rendah dari '.$smin.'C';
            // $log->monitoring_id = $data->id;
            // $log->time = date('H:i:s');
            // $log->save();

        }

        if($datamsg->kelembapan > $kmax){
            $sendAlert[] = "Kelembapan: ".$datamsg->kelembapan.'% lebih tinggi dari '.$kmax.'%';
            // $log = new Log_alert;
            // $log->status = 'High presure';
            // $log->keterangan = $datamsg->kelembapan.'% lebih tinggi dari '.$kmax.'%';
            // $log->monitoring_id = $data->id;
            // $log->time = date('H:i:s');
            // $log->save();
        }

        if($datamsg->kelembapan < $kmin){
            $sendAlert[] = "Kelembapan: ".$datamsg->kelembapan.'% lebih rendah dari '.$kmin.'%';
            // $log = new Log_alert;
            // $log->status = 'Low presure';
            // $log->keterangan = $datamsg->kelembapan.'% lebih rendah dari '.$kmin.'%';
            // $log->monitoring_id = $data->id;
            // $log->time = date('H:i:s');
            // $log->save();
        }

        if($datamsg->tekanan > $tmax){
            $sendAlert[] = "Tekanan: ".$datamsg->tekanan.'Pa lebih tinggi dari '.$tmax.'Pa';
            // $log = new Log_alert;
            // $log->status = 'High presure';
            // $log->keterangan = $datamsg->tekanan.'Pa lebih tinggi dari '.$tmax.'Pa';
            // $log->monitoring_id = $data->id;
            // $log->time = date('H:i:s');
            // $log->save();

        }

        if($datamsg->tekanan < $tmin){
            $sendAlert[] = "Tekanan: ".$datamsg->tekanan.'Pa lebih rendah dari '.$tmin.'Pa';
            // $log = new Log_alert;
            // $log->status = 'Low presure';
            // $log->keterangan = $datamsg->tekanan.'Pa lebih rendah dari '.$tmin.'Pa';
            // $log->monitoring_id = $data->id;
            // $log->time = date('H:i:s');
            // $log->save();
        }


        if ($datamsg->alarm == 1) {
            $toMail = KirimAlarm::all();
            foreach ($toMail as $send) {
                echo $send->id_operator."\n";
                Mail::to(Operator::where('id', $send->id_operator)->first())->send(new sendEmail($send->custom_teks, $sendAlert));
            }
            // $awal = date("Y-m-d");
            // $akhir = date("Y-m-d");

            // $set = Laporan::find(1)->first();
            // $data = Monitoring::whereBetween('date',[$awal, $akhir])->latest()->get();
            //     // dd($data);
            // $pos = 'Ruangan';
            // $pp = "kosong";
            // $sumber = "Semua Ruangan dan Parameter";

            // $pdf = app('dompdf.wrapper');
            // $pdf->getDomPDF()->set_option("enable_php", true);
            // $pdf = PDF::loadview('Admin.Laporan.email_pdf',['data'=>$data, 'pos'=>$pos, 'parameter'=>"Semua", 'sumber' => $sumber, 'email' => 'example@mail.com', 'set'=>$set, 'awal'=>$awal, 'akhir'=>$akhir]);

            // $awal = date("Y-m-d");
            // $akhir = date("Y-m-d");

            foreach ($sendAlert as $f) {
                $text = "Alert!!!\n"
                . "<b>Message: </b>\n"
                . $f;



            // $store = $pdf->download()->getOriginalContent();


            // $namePDF = time().'_file.pdf';

            // Storage::disk('public')->put($namePDF, $store);
                 Telegram::sendMessage([
                    'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001237937318'),
                    'parse_mode' => 'HTML',
                    'text' => $text
                ]);

            }
           // Telegram::sendDocument([
           //      'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001237937318'),
           //       'document' => InputFile::create(public_path().'/report/'.$namePDF),
           //       'caption' => 'This is a document',
           //  ]);
           }

        });
    }
}




