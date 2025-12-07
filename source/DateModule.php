<?php

namespace Papimod\Date;

use Papi\error\MissingModuleException;
use Papi\Module;

class DateModule extends Module
{
    public const DEFAULT_DATE_FORMAT = "Y-m-d H:i:s";

    public const DEFAULT_TIMEZONE = "Europe/Paris";

    protected string $path = __DIR__;

    public function __construct()
    {
        $this->checkPrerequisites();
        $this->configure();
    }

    private function checkPrerequisites(): void
    {
        if (class_exists("Papimod\\Dotenv\\DotenvModule") === false) {
            throw new MissingModuleException(self::class, "Papimod\\Dotenv\\DotenvModule");
        }
    }

    public function configure(): void
    {
        if (defined("DATE_FORMAT") === false) {
            define("DATE_FORMAT", $_SERVER['DATE_FORMAT'] ?? DateModule::DEFAULT_DATE_FORMAT);
        }

        if (defined("DATE_TIMEZONE") === false) {
            define("DATE_TIMEZONE", $_SERVER['DATE_TIMEZONE'] ?? date_default_timezone_get());
            date_default_timezone_set(DATE_TIMEZONE);
        }
    }
}
