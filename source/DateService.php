<?php

namespace Papimod\Date;

use DateTime;

final class DateService
{
    /**
     * Converts text to date using the globally configured format
     */
    public function toString(DateTime $date): string
    {
        return $date->format(DATE_FORMAT);
    }

    /**
     * Converts text to date using the globally configured format
     */
    public function fromString(string $date): DateTime|false
    {
        return DateTime::createFromFormat(DATE_FORMAT, $date);
    }
}
