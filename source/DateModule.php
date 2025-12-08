<?php

namespace Papimod\Date;

use Papi\ApiModule;
use Papimod\Dotenv\DotEnvModule;

use function DI\create;

class DateModule extends ApiModule
{
    protected string $path = __DIR__;

    public function __construct()
    {
        $this->prerequisite_list = [DotEnvModule::class];
        $this->definition_list = [DateService::class => create()->constructor()];
    }

    public function configure(): void
    {
        if (defined("DATE_FORMAT") === false) {
            define("DATE_FORMAT", $_SERVER['DATE_FORMAT'] ?? "Y-m-d H:i:s");
        }

        if (defined("DATE_TIMEZONE") === false) {
            define("DATE_TIMEZONE", $_SERVER['DATE_TIMEZONE'] ?? "Europe/Paris");
        }

        date_default_timezone_set(DATE_TIMEZONE);
    }
}
