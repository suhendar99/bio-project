<?php
 
namespace App\Http\Controllers;
 
use Telegram\Bot\Laravel\Facades\Telegram;
 
class TelegramBotController extends Controller
{
    public function updatedActivity()
    {
        $activity = Telegram::getUpdates();
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
             'document' => 'C:\laragon\www\bio-project\public\report\sample.pdf',
             'caption' => 'This is a document',
        ]);
        
    }
}