<?php

namespace Papimod\Date;

use DateTime;

final class DateService
{
    public function dateToString(DateTime $date): string
    {
        return $date->format(DATE_FORMAT);
    }

    public function dateFromString(string $date): DateTime|false
    {
        return DateTime::createFromFormat(DATE_FORMAT, $date);
    }
}
