<?php

namespace AQuadic\AQWhatsapp;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Traits\Conditionable;

class AQWhatsapp
{
    use Conditionable;

    /**
     * @var string
     */
    protected string $baseUrl = 'https://whatsapp.aq-apps.xyz/api';

    /**
     * @var string|null
     */
    protected ?string $apiToken;

    /**
     * @var string|null
     */
    protected ?string $sessionUUID;

    /**
     * Url of WPPConnect API/Server.
     *
     * @var string
     */
    protected string $requestPath;

    /**
     * Data
     *
     * @var array
     */
    protected array $data = [];

    public function __construct()
    {
        $this->apiToken = config('aqwhatsapp.api_token', null);
        $this->sessionUUID = config('aqwhatsapp.session_uuid', null);
    }

    /**
     * Send a text message to a WhatsApp number.
     *
     * @param string $number
     * @param string $message
     * @param Carbon|null $schedule
     * @return static
     */
    public function sendTextMessage(string $number, string $message, ?Carbon $schedule = null): static
    {
        $this->requestPath = 'send-message';
        $this->data['phone'] = $number;
        $this->data['message'] = $message;
        $this->data['schedule_at'] = $schedule ?? now();
        $this->send();

        return $this;
    }

    /**
     * Sending The request to our nodejs server.
     *
     * @returns Response
     */
    protected function send(): Response
    {
        $this->data['session_uuid'] = $this->sessionUUID;

        return Http::baseUrl($this->baseUrl)
            ->withHeaders([
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . $this->apiToken,
            ])
            ->post($this->requestPath, $this->data);
    }

    /**
     * Send a text message to a WhatsApp number.
     *
     * @param string $number
     * @param string $imageUrl
     * @param string|null $message
     * @param Carbon|null $schedule
     * @return static
     */
    public function sendImageMessage(string $number, string $imageUrl, string $message = null, ?Carbon $schedule = null): static
    {
        $this->requestPath = 'send-image';
        $this->data['phone'] = $number;
        $this->data['message'] = $message ?? null;
        $this->data['image'] = $imageUrl;
        $this->data['schedule_at'] = $schedule ?? now();
        $this->send();

        return $this;
    }

    /**
     * Send a Buttons message to a WhatsApp number.
     *
     * @param string $number
     * @param string $message
     * @param string $title
     * @param string $footer
     * @param array $buttons ['text', 'phoneNumber', 'url']
     * @param Carbon|null $schedule
     * @return static
     */
    public function sendButtonsMessage(
        string $number,
        array $buttons,
        string $message,
        string $title,
        string $footer,
        ?Carbon $schedule = null,
    ): static {
        $this->requestPath = 'send-buttons';
        $this->data['phone'] = $number;
        $this->data['message'] = $message;
        $this->data['title'] = $title;
        $this->data['footer'] = $footer;
        $this->data['buttons'] = $buttons;
        $this->data['schedule_at'] = $schedule ?? now();
        $this->send();

        return $this;
    }

    /**
     * Send a Buttons List message to a WhatsApp number.
     *
     * @param string $number
     * @param string $message
     * @param string $buttonText
     * @param array $buttons ['title', 'description']
     * @param Carbon|null $schedule
     * @return static
     */
    public function sendButtonsListMessage(
        string $number,
        array $buttons,
        string $message,
        string $buttonText,
        ?Carbon $schedule = null,
    ): static {
        $this->requestPath = 'send-buttons-list';
        $this->data['phone'] = $number;
        $this->data['message'] = $message;
        $this->data['button_text'] = $buttonText;
        $this->data['buttons_list'] = $buttons;
        $this->data['schedule_at'] = $schedule ?? now();
        $this->send();

        return $this;
    }

    /**
     * Sets Session Id.
     *
     * @param string $sessionUUID
     * @return static
     */
    public function setSessionId(string $sessionUUID): static
    {
        $this->sessionUUID = $sessionUUID;

        return $this;
    }

    /**
     * Delay Just native PHP Sleep
     * @returns static
     */
    public function delay(int $seconds): static
    {
        sleep($seconds);

        return $this;
    }
}
