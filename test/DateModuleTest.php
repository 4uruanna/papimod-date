<?php

namespace Papimod\Date\Test;

use Papi\ApiBuilder;
use Papi\enumerator\HttpMethods;
use Papi\Test\ApiBaseTestCase;
use Papimod\Date\DateModule;
use Papimod\Dotenv\DotEnvModule;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Small;

#[CoversClass(DateModule::class)]
#[Small]
final class DateModuleTest extends ApiBaseTestCase
{
    public function testLoadModule(): void
    {
        define("ENVIRONMENT_DIRECTORY", __DIR__);
        define("ENVIRONMENT_FILE", ".test.env");

        $request = $this->createRequest(HttpMethods::GET, "/fake");
        $response = ApiBuilder::getInstance()
            ->setModules([
                DotEnvModule::class,
                DateModule::class
            ])
            ->setActions([FakeAction::class])
            ->build()
            ->handle($request);

        $this->assertEquals(date_default_timezone_get(), DATE_TIMEZONE);
        $this->assertEquals("2025-12-05 12:00:00", (string) $response->getBody());
    }
}
