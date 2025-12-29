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
        if (defined("PAPI_DATE_FORMAT") === false) {
            $format = $_ENV["DATE_FORMAT"] ?? "Y-m-d";
            define("PAPI_DATE_FORMAT", $format);
        }

        if (defined("PAPI_TIME_FORMAT") === false) {
            $format = $_ENV["DATE_TIME_FORMAT"] ?? "H:i:s";
            define("PAPI_TIME_FORMAT", $format);
        }

        if (defined("PAPI_DATE_TIMEZONE") === false) {
            $timezone = $_ENV["DATE_TIMEZONE"] ?? "Europe/Paris";
            define("PAPI_DATE_TIMEZONE", $timezone);
        }

        date_default_timezone_set(PAPI_DATE_TIMEZONE);
    }
}
