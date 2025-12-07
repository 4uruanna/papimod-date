# Date Papi Module

![]( https://img.shields.io/badge/php-8.5-777BB4?logo=php)
![]( https://img.shields.io/badge/composer-2-885630?logo=composer)

## Description

Help defining the API [date format](https://www.php.net/manual/en/datetime.format.php) with [time zone](https://www.php.net/manual/en/timezones.php) in your [papi](https://github.com/4uruanna/papi).

Also provide a `DateService` class to convert dates.

## Prerequisites Modules

- [Papimod/Dotenv](https://github.com/4uruanna/papimod-dotenv)

## Configuration

### `DATE_FORMAT` (.ENV)

|               |                                                   |
|-:             |:-                                                 |
|Required       | No                                                |
|Type           | string                                            |
|Description    | DateTime format                                   |
|Default        | `Y-m-d H:i:s`                                     |

### `DATE_TIMEZONE` (.ENV)

|               |                                                   |
|-:             |:-                                                 |
|Required       | No                                                |
|Type           | string                                            |
|Description    | Global API timezone                               |
|Default        | `Europe/Paris`                                    |
