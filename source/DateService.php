<?php

namespace Papimod\Date;

use DateTime;

final class DateService
{
    /**
     * Converts text to date using the globally configured format
     * 
     * @param DateTime $date
     */
    public function format(DateTime $date): string
    {
        return $date->format(DATE_FORMAT);
    }

    /**
     * Parse a date using the globally configured format
     * 
     * @param string $date
     */
    public function parse(string $date): DateTime|false
    {
        return DateTime::createFromFormat(DATE_FORMAT, $date);
    }

    /**
     * Checks if the given date is valid
     *
     * @param string $date
     */
    public function validate(string $date): bool
    {
        return DateTime::createFromFormat(DATE_FORMAT, $date) !== false;
    }
}
