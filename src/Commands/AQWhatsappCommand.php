<?php

namespace AQuadic\AQWhatsapp\Commands;

use AQuadic\AQWhatsapp\AQWhatsapp;
use Illuminate\Console\Command;

class AQWhatsappCommand extends Command
{
    public $signature = 'aqwhatsapp:send-message';

    public $description = 'Sending Message From AQWhatsapp';

    public function handle(AQWhatsapp $AQWhatsapp): int
    {
        $phone = $this->ask('Enter Phone Number');
        $message = $this->ask('Enter Message');

        $AQWhatsapp->sendTextMessage($phone, $message);

        return self::SUCCESS;
    }
}
