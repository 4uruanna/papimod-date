<?php

namespace Papimod\Date\Test;

use Papi\AppBuilder;
use Papimod\Date\DateModule;
use Papimod\Dotenv\DotenvModule;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Small;
use PHPUnit\Framework\TestCase;

#[CoversClass(DateModule::class)]
#[Small]
final class DateModuleTest extends TestCase
{
    public function testLoadModule(): void
    {
        define("API_ENV_DIRECTORY", __DIR__);

        new AppBuilder()
            ->setModules([
                DotenvModule::class,
                DateModule::class
            ])
            ->build();

        $this->assertEquals(date_default_timezone_get(), DATE_TIMEZONE);
    }
}
