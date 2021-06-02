<?php
/**
 * User  : Yusuf Abdillah Putra
 * Date  : 9/5/2020
 */

namespace App\Helpers;

use Carbon\Carbon;

class TelegramBot
{

    public static function pushMessage($message): void
    {
        if (env('TELEGRAM_BOT_ENABLE')) {
            $token = env('TELEGRAM_BOT_TOKEN');
            $chatId = env('TELEGRAM_BOT_CHAT_ID');
            $wa = '<a href="https://api.whatsapp.com/send?phone='. $message['nomor'] .'">'. $message['nomor'] .'</a>';
            $text = '<b>' . 'Reservasi Pasien' . '</b>' . PHP_EOL
                . '=============' .  PHP_EOL
                . '<i>Tanggal Daftar : </i>'. Carbon::now()->format('Y-m-d H:i:s') . PHP_EOL
                . '<b>' . 'Nama : ' . '</b>'. '<code>' . $message['nama'] . '</code>' . PHP_EOL
                . '<b>' . 'Umur : ' . '</b>'. '<code>' . $message['umur'] . '</code>' . PHP_EOL
                . '<b>' . 'Jenis Kelamin : ' . '</b>'. '<code>' . $message['jenis_kelamin'] . '</code>' . PHP_EOL
                . '<b>' . 'Alamat : ' . '</b>'. '<code>' . $message['alamat'] . '</code>' . PHP_EOL
                . '<b>' . 'Keluhan : ' . '</b>'. '<code>' . implode(', ',$message['keluhan']) . '</code>' . PHP_EOL
                . '<b>' . 'No WhastApp : '. '</b> '. $wa . PHP_EOL;
            try {
                $test = file_get_contents(
                    'https://api.telegram.org/bot' . $token . '/sendMessage?'
                    . http_build_query([
                        'text' => $text,
                        'chat_id' => $chatId,
                        'parse_mode' => 'html'
                    ])
                );
                
            } catch (\Exception $e) {
                dd($e->getMessage());
            }
        }
    }

}
