<?php

namespace Papimod\Date;

use Papi\ApiModule;
use Papimod\Dotenv\DotEnvModule;

use function DI\create;

class DateModule extends ApiModule
{
    public static function getDefaultDateFormat(): string
    {
        return "Y-m-d H:i:s";
    }

    public static function getDefaultDateTimezone(): string
    {
        return "Europe/Paris";
    }

    protected string $path = __DIR__;

    public ?array $prerequisite_list = [
        DotEnvModule::class
    ];

    public function __construct()
    {
        $this->definition_list = [
            DateService::class => create()->constructor()
        ];
    }

    /**
     * Configure the module
     */
    public function configure(): void
    {
        $this->defineDateFormat();
        $this->defineDateTimezone();
        date_default_timezone_set(DATE_TIMEZONE);
    }

    /**
     * Define the date format
     */
    public function defineDateFormat(): void
    {
        if (defined("DATE_FORMAT") === false) {
            $format = self::getDefaultDateFormat();

            if (isset($_SERVER['DATE_FORMAT'])) {
                $format = $_SERVER['DATE_FORMAT'];
            }

            define("DATE_FORMAT", $format);
        }

        $_SERVER['DATE_FORMAT'] = DATE_FORMAT;
    }

    /**
     * Define the date timezone
     */
    public function defineDateTimezone(): void
    {
        if (defined("DATE_TIMEZONE") === false) {
            $timezone = self::getDefaultDateTimezone();

            if (isset($_SERVER['DATE_TIMEZONE'])) {
                $timezone = $_SERVER['DATE_TIMEZONE'];
            }

            define("DATE_TIMEZONE", $timezone);
        }

        $_SERVER['DATE_TIMEZONE'] = DATE_TIMEZONE;
    }
}
