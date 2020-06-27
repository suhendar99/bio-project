<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Mqtt;
use PDF;
 
 
use Validator;
use App\Satuan;
use App\Setapp;
use App\Ruangan;
use App\Laporan;
use App\SetKirim;
use App\Operator;
use App\Log_alert;
use App\KirimAlarm;
use App\Monitoring;
use App\Mail\sendEmail;
use App\Mail\VerifyMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class everyMinute extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'minute:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email every minute';

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
        $setKirim = SetKirim::all();
        foreach ($setKirim as $po) {
            $set = Laporan::find(1)->first();
            $date = date("d");
            $m = date("n")-1;

            if($date <= 7){
                if($m == 4 || $m == 6 || $m == 9 || $m == 11){
                    $plus = $date + 30;
                    $rose = $plus - 7;
                }elseif($m == 2){
                    $plus = $date + 28;
                    $rose = $plus - 7;
                }else{
                    $plus = $date + 31;
                    $rose = $plus - 7;
                }
            }

            if ($po->status_kirim == "Weekly") {
                if ($date <= 7) {
                    $end = date("Y-m");
                    $awal = $end."-".$rose;
                    $akhir = date("Y-m-d");
                } else {
                    $end = date("Y-m");
                    $first = date("d")-7 ;
                    $awal = $end."-".$first;
                    $akhir = date("Y-m-d");
                }
            } else {
                $awal = date("Y-m-d");
                $akhir = date("Y-m-d");
            }
            
            
            $data = Monitoring::whereBetween('date',[$awal, $akhir])->latest()->get();
                // dd($data);
            $pos = 'Ruangan';
            $pp = "kosong";
            $sumber = "Semua Ruangan dan Parameter";

            $pdf = app('dompdf.wrapper');
            $pdf->getDomPDF()->set_option("enable_php", true);
            $pdf = PDF::loadview('Admin.Laporan.email_pdf',['data'=>$data, 'pos'=>$pos, 'parameter'=>"Semua", 'sumber' => $sumber, 'email' => $po->Operator->email, 'set'=>$set, 'awal'=>$awal, 'akhir'=>$akhir]);

            try{
                Mail::to($po->Operator->email)->send(new VerifyMail($data, $pdf));
            }catch(JWTException $exception){
                $this->serverstatuscode = "0";
                $this->serverstatusdes = $exception->getMessage();
            }
            if (Mail::failures()) {
                 $this->statusdesc  =   "Error sending mail";
                 $this->statuscode  =   "0";

            }else{

               $this->statusdesc  =   "Message sent Succesfully";
               $this->statuscode  =   "1";
            }
        }
    }
}
