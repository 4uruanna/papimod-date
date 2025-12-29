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
|Description    | Global date format                                |
|Default        | `Y-m-d`                                           |

### `DATE_TIME_FORMAT` (.ENV)

|               |                                                   |
|-:             |:-                                                 |
|Required       | No                                                |
|Type           | string                                            |
|Description    | Global time format                                |
|Default        | `H:i:s`                                           |

### `DATE_TIMEZONE` (.ENV)

|               |                                                   |
|-:             |:-                                                 |
|Required       | No                                                |
|Type           | string                                            |
|Description    | Global timezone                                   |
|Default        | `Europe/Paris`                                    |

## Definitions

- [(service) DateService](./source/DateService.php)

## Usage

You can add the following options to your  `.env` file:

```
DATE_FORMAT="Y-m-d"
DATE_TIME_FORMAT="H:i:s"
DATE_TIMEZONE="Europe/Paris"
```

Import the module when creating your application:

```php
require __DIR__ . "/../vendor/autoload.php";

use Papi\PapiBuilder;
use Papimod\Dotenv\DotEnvModule;
use Papimod\Date\DateModule;
use function DI\create;

$builder = new PapiBuilder();

$builder->setModule(
        DotEnvModule::class,
        DateModule::class
    )
    ->build()
    ->run();
```

Use the dedicated service anywhere:

```php
final class MyService
{
    public function __construct(public readonly DateService $date_service) 
    {
    }

    public getNow(): string
    {
        $now = new DateTime();
        return $this->date_service->format($now);
    }
}
```