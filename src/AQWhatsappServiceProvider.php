<?php

namespace AQuadic\AQWhatsapp;

use AQuadic\AQWhatsapp\Commands\AQWhatsappCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class AQWhatsappServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('aqwhatsapp')
            ->hasConfigFile()
            ->hasCommand(AQWhatsappCommand::class);
    }
}
