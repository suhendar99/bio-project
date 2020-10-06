<?php
error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
// use Mqtt;
use App\Monitoring;
use App\Laporan;
use App\Satuan;
use App\KirimAlarm;
use App\Perangkat;
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
	        $payload = json_decode($msg);
        	$perangkat = Perangkat::find(1);
			$perangkat_id = $perangkat->no_seri;
	        echo "\t$perangkat_id\n\n";
	        $jsonobj = '[
	        	{
	        		"suhu" : '.$payload->temp_airlock.',
	        		"kelembapan" : '.$payload->rh_airlock.',
	        		"tekanan" : '.$payload->scaling_airlock.',
	        		"ruangan_id" : 1,
	        		"alarm" : 0,
	        		"cvc" : '.$payload->cvc_airlock.',
	        		"vvc" : '.$payload->vvc_airlock.'
	    	    },
	    	    {
	        		"suhu" : '.$payload->temp_vest.',
	        		"kelembapan" : '.$payload->rh_vest.',
	        		"tekanan" : '.$payload->scaling_vest.',
	        		"ruangan_id" : 2,
	        		"alarm" : 0,
	        		"cvc" : '.$payload->cvc_vest.',
	        		"vvc" : '.$payload->vvc_vest.'
	    	    },
	    	    {
	        		"suhu" : '.$payload->temp_dressing.',
	        		"kelembapan" : '.$payload->rh_dressing.',
	        		"tekanan" : '.$payload->scaling_dressing.',
	        		"ruangan_id" : 3,
	        		"alarm" : 0,
	        		"cvc" : '.$payload->cvc_dressing.',
	        		"vvc" : '.$payload->vvc_dressing.'
	        	},
	        	{
	        		"suhu" : '.$payload->temp_sample.',
	        		"kelembapan" : '.$payload->rh_sample.',
	        		"tekanan" : '.$payload->scaling_sample.',
	        		"ruangan_id" : 4,
	        		"alarm" : 0,
	        		"cvc" : '.$payload->cvc_sample.',
	        		"vvc" : '.$payload->vvc_sample.'
	        	},
	        	{
	        		"suhu" : '.$payload->temp_uji.',
	        		"kelembapan" : '.$payload->rh_uji.',
	        		"tekanan" : '.$payload->scaling_uji.',
	        		"ruangan_id" : 5,
	        		"alarm" : 0,
	        		"cvc" : '.$payload->cvc_uji.',
	        		"vvc" : '.$payload->vvc_uji.'
	        	}
	    	]';
			$datas = json_decode($jsonobj);
	        // echo "\t$datas\n\n";
	        foreach($datas as $data) {
	        	$alert = 0;

	        	$satuanSuhu = Satuan::find(1);
	        	$satuanKelembapan = Satuan::find(2);
	        	$satuanTekanan = Satuan::find(3);

		        $monitor = Monitoring::create([
		            'suhu' => $data->suhu,
		            'kelembapan' => $data->kelembapan,
		            'tekanan' => $data->tekanan,
		            'perangkat_id' => $perangkat_id,
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
		            $sendAlert[] = "Suhu: ".$data->suhu.''.$satuanSuhu.' lebih tinggi dari '.$smax."".$satuanSuhu."\nRuangan: ".$ruang->nama;
		            $log = new Log_alert;
		            $log->status = 'High presure';
		            $log->keterangan = $data->suhu.''.$satuanSuhu.' lebih tinggi dari '.$smax."".$satuanSuhu."";
		            $log->monitoring_id = $monitor->id;
		            $log->time = date('H:i:s');
		            $log->save();
		        }

		        if($data->suhu < $smin){
		            $sendAlert[] = "Suhu: ".$data->suhu.''.$satuanSuhu.' lebih rendah dari '.$smin."".$satuanSuhu."\nRuangan: ".$ruang->nama;
		            $log = new Log_alert;
		            $log->status = 'Low presure';
		            $log->keterangan = $data->suhu.''.$satuanSuhu.' lebih rendah dari '.$smin."".$satuanSuhu."";
		            $log->monitoring_id = $monitor->id;
		            $log->time = date('H:i:s');
		            $log->save();
		        }

		        if($data->kelembapan > $kmax){
		            $sendAlert[] = "Kelembapan: ".$data->kelembapan.''.$satuanKelembapan.' lebih tinggi dari '.$kmax."".$satuanKelembapan."\nRuangan: ".$ruang->nama;
		            $log = new Log_alert;
		            $log->status = 'High presure';
		            $log->keterangan = $data->kelembapan.''.$satuanKelembapan.' lebih tinggi dari '.$kmax."".$satuanKelembapan;
		            $log->monitoring_id = $monitor->id;
		            $log->time = date('H:i:s');
		            $log->save();
		        }

		        if($data->kelembapan < $kmin){
		            $sendAlert[] = "Kelembapan: ".$data->kelembapan.''.$satuanKelembapan.' lebih rendah dari '.$kmin."".$satuanKelembapan."\nRuangan: ".$ruang->nama;
		            $log = new Log_alert;
		            $log->status = 'Low presure';
		            $log->keterangan = $data->kelembapan.''.$satuanKelembapan.' lebih rendah dari '.$kmin."".$satuanKelembapan;
		            $log->monitoring_id = $monitor->id;
		            $log->time = date('H:i:s');
		            $log->save();
		        }

		        if($data->tekanan > $tmax){
		            $sendAlert[] = "Tekanan: ".$data->tekanan.''.$satuanTekanan.' lebih tinggi dari '.$tmax."".$satuanTekanan."\nRuangan: ".$ruang->nama;
		            $log = new Log_alert;
		            $log->status = 'High presure';
		            $log->keterangan = $data->tekanan.''.$satuanTekanan.' lebih tinggi dari '.$tmax."".$satuanTekanan;
		            $log->monitoring_id = $monitor->id;
		            $log->time = date('H:i:s');
		            $log->save();
		        }

		        if($data->tekanan < $tmin){
		            $sendAlert[] = "Tekanan: ".$data->tekanan.''.$satuanTekanan.' lebih rendah dari '.$tmin."".$satuanTekanan."\nRuangan: ".$ruang->nama;
		            $log = new Log_alert;
		            $log->status = 'Low presure';
		            $log->keterangan = $data->tekanan.''.$satuanTekanan.' lebih rendah dari '.$tmin."".$satuanTekanan;
		            $log->monitoring_id = $monitor->id;
		            $log->time = date('H:i:s');
		            $log->save();
		        }


		        if (count($sendAlert) > 0) {
		            $toMail = KirimAlarm::all();
		            foreach ($toMail as $send) {
		                echo $send->operator->name."\n";
		                Mail::to(Operator::where('id', $send->id_operator)->first())->send(new sendEmail($send->custom_teks, $sendAlert));
		            }
                
                	$text = "";

		            foreach ($sendAlert as $f) {
		                $text = $text."\n\n Alert!!!\n"
		                . "<b>Message: </b>\n"
		                . $f."\n\n";

		            }
                
                	Telegram::sendMessage([
                            'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001237937318'),
                            'parse_mode' => 'HTML',
                            'text' => $text
                        ]);
		           }
		        }
	        }
	   );
    }
}


