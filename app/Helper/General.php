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
				// $jsonobj = '[{"suhu":35,"tekanan":37,"kelembapan":43},{"suhu":40,"tekanan":55,"kelembapan":43}]';

				$datas = json_decode($jsonobj);

				// foreach ($obj as $o) {
				// 	echo "suhu : ".$o->suhu."\n";
				// 	echo "tekanan : ".$o->tekanan."\n";
				// 	echo "kelembapan : ".$o->kelembapan."\n";
				// }
	    	// dd($datas);


	    	// $all = json_decode($datas);
	        // $payload = array();
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
		            $sendAlert[] = "Suhu: ".$data->suhu.'C lebih tinggi dari '.$smax.'C';
		            $log = new Log_alert;
		            $log->status = 'High presure';
		            $log->keterangan = $data->suhu.'C lebih tinggi dari '.$smax.'C';
		            $log->monitoring_id = $monitor->id;
		            $log->time = date('H:i:s');
		            $log->save();
		        }

		        if($data->suhu < $smin){
		            $sendAlert[] = "Suhu: ".$data->suhu.'C lebih rendah dari '.$smin.'C';
		            $log = new Log_alert;
		            $log->status = 'Low presure';
		            $log->keterangan = $data->suhu.'C lebih rendah dari '.$smin.'C';
		            $log->monitoring_id = $monitor->id;
		            $log->time = date('H:i:s');
		            $log->save();
		        }

		        if($data->kelembapan > $kmax){
		            $sendAlert[] = "Kelembapan: ".$data->kelembapan.'% lebih tinggi dari '.$kmax.'%';
		            $log = new Log_alert;
		            $log->status = 'High presure';
		            $log->keterangan = $data->kelembapan.'% lebih tinggi dari '.$kmax.'%';
		            $log->monitoring_id = $monitor->id;
		            $log->time = date('H:i:s');
		            $log->save();
		        }

		        if($data->kelembapan < $kmin){
		            $sendAlert[] = "Kelembapan: ".$data->kelembapan.'% lebih rendah dari '.$kmin.'%';
		            $log = new Log_alert;
		            $log->status = 'Low presure';
		            $log->keterangan = $data->kelembapan.'% lebih rendah dari '.$kmin.'%';
		            $log->monitoring_id = $monitor->id;
		            $log->time = date('H:i:s');
		            $log->save();
		        }

		        if($data->tekanan > $tmax){
		            $sendAlert[] = "Tekanan: ".$data->tekanan.'Pa lebih tinggi dari '.$tmax.'Pa';
		            $log = new Log_alert;
		            $log->status = 'High presure';
		            $log->keterangan = $data->tekanan.'Pa lebih tinggi dari '.$tmax.'Pa';
		            $log->monitoring_id = $monitor->id;
		            $log->time = date('H:i:s');
		            $log->save();
		        }

		        if($data->tekanan < $tmin){
		            $sendAlert[] = "Tekanan: ".$data->tekanan.'Pa lebih rendah dari '.$tmin.'Pa';
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



						Telegram::sendMessage([
							'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001237937318'),
		                    'parse_mode' => 'HTML',
		                    'text' => $text
						]);

							// $store = $pdf->download()->getOriginalContent();


							// $namePDF = time().'_file.pdf';

							// Storage::disk('public')->put($namePDF, $store);
		            }
		           // Telegram::sendDocument([
		           //      'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001237937318'),
		           //       'document' => InputFile::create(public_path().'/report/'.$namePDF),
		           //       'caption' => 'This is a document',
		           //  ]);
		           }
		        }
	        }
	   );
    }
}


