<?php

namespace Papimod\Date;

use Papi\PapiModule;
use Papimod\Dotenv\DotEnvModule;

use function DI\create;

class DateModule extends PapiModule
{
    public static function getPrerequisites(): array
    {
        return [DotEnvModule::class];
    }

    public static function getDefinitions(): array
    {
        return [DateService::class => create()->constructor()];
    }

    /**
     * Configure the module
     */
    public static function configure(): void
    {
        if (defined("DATE_FORMAT") === false) {
            $format = $_ENV["DATE_FORMAT"] ?? "Y-m-d H:i:s";
            define("DATE_FORMAT", $format);
        }

        if (defined("DATE_TIMEZONE") === false) {
            $timezone = $_ENV["DATE_TIMEZONE"] ?? "Europe/Paris";
            define("DATE_TIMEZONE", $timezone);
        }

        date_default_timezone_set(DATE_TIMEZONE);
    }
}
