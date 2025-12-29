<?php

namespace Papimod\Date;

use DateTime;

final class DateService
{
    public function format(DateTime $date): string
    {
        return $date->format(PAPI_DATE_FORMAT . " " . PAPI_TIME_FORMAT);
    }

    public function formatDate(DateTime $date)
    {
        return $date->format(PAPI_DATE_FORMAT);
    }

    public function formatTime(DateTime $date): string
    {
        return $date->format(PAPI_TIME_FORMAT);
    }

    public function parse(string $date): DateTime|false
    {
        return DateTime::createFromFormat(PAPI_DATE_FORMAT . " " . PAPI_TIME_FORMAT, $date);
    }

    public function parseDate(string $date): DateTime|false
    {
        $result = DateTime::createFromFormat(PAPI_DATE_FORMAT, $date);
        return $result->setTime(0, 0);
    }

    public function parseTime(string $date): DateTime|false
    {
        $result = DateTime::createFromFormat(PAPI_TIME_FORMAT, $date);
        return $result->setDate(1970, 1, 1);
    }

    public function validate(string $date): bool
    {
        return DateTime::createFromFormat(PAPI_DATE_FORMAT . " " . PAPI_TIME_FORMAT, $date) !== false;
    }

    public function validateDate(string $date): bool
    {
        return DateTime::createFromFormat(PAPI_DATE_FORMAT, $date) !== false;
    }

    public function validateTime(string $date): bool
    {
        return DateTime::createFromFormat(PAPI_TIME_FORMAT, $date) !== false;
    }
}
