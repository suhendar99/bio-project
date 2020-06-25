<?php
 
namespace App\Http\Controllers;
 
use Telegram\Bot\Laravel\Facades\Telegram;
use Telegram\Bot\FileUpload\InputFile;
 
class TelegramBotController extends Controller
{
    public function updatedActivity()
    {
        $activity = Telegram::getMe();;
        dd($activity);
    }

    public function sendMessage()
    {
         $text = "A new contact us query\n"
            . "<b>Email Address: </b>\n"
            . "test@mail.com\n"
            . "<b>Message: </b>\n"
            . "Hello there";

        

        //  Telegram::sendMessage([
        //     'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001237937318'),
        //     'parse_mode' => 'HTML',
        //     'text' => $text
        // ]);

        
         Telegram::sendDocument([
            'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001237937318'),
             'document' => InputFile::create('report/sample.pdf'),
             'caption' => 'This is a document',
        ]);
        
    }
}