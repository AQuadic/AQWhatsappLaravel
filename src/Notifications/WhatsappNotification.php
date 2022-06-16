<?php

namespace AQuadic\AQWhatsapp\Notifications;

use AQuadic\AQWhatsapp\AQWhatsapp;
use Illuminate\Notifications\Notification;

class WhatsappNotification
{
    /** @var AQWhatsapp */
    protected AQWhatsapp $client;

    public function __construct(AQWhatsapp $client)
    {
        $this->client = $client;
    }

    /**
     * Send the given notification.
     *
     * @param mixed $notifiable
     * @param Notification $notification
     * @return void
     */
    public function send($notifiable, Notification $notification)
    {
        $message = $notification->toWhatsapp($notifiable);

        foreach ($message['phones'] as $phone) {
            $this->sendMessage($phone, $message);
        }
    }

    /**
     * Send message to whatsapp
     *
     * @returns bool
     */
    public function sendMessage($phone, array $message): bool
    {
        try {
            switch ($message['type']) {
                case 'image':
                    $this->client->sendImageMessage($phone, $message['image'], $message['message']);

                    break;
                case 'buttons':
                    $this->client->sendButtonsMessage($phone, $message['buttons'], $message['message'], $message['title'], $message['footer']);

                    break;
                case 'buttons-list':
                    $this->client->sendButtonsListMessage($phone, $message['buttons'], $message['message'], $message['button_text']);

                    break;
                case 'text':
                default:
                    $this->client->sendTextMessage($phone, $message['message']);

                    break;
            }

            return true;
        } catch (\Exception $e) {
            unset($e);

            return false;
        }
    }
}
