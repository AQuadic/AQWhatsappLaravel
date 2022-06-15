<?php

namespace AQuadic\AQWhatsapp\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \AQuadic\AQWhatsapp\AQWhatsapp
 */
class AQWhatsapp extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'aqwhatsapp';
    }
}
