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
    public function setUp(): void
    {
        parent::setUp();
        defined("ENVIRONMENT_DIRECTORY") || define("ENVIRONMENT_DIRECTORY", __DIR__);
        defined("ENVIRONMENT_FILE") || define("ENVIRONMENT_FILE", ".test.env");
    }

    public function testLoadModule(): void
    {
        ApiBuilder::getInstance()
            ->setModules([
                DotEnvModule::class,
                DateModule::class
            ])
            ->build();

        $this->assertEquals(date_default_timezone_get(), DATE_TIMEZONE);
    }

    public function testLoadModuleDefinitions(): void
    {
        $request = $this->createRequest(HttpMethods::GET, "/fake");
        $response = ApiBuilder::getInstance()
            ->setModules([
                DotEnvModule::class,
                DateModule::class
            ])
            ->setActions([FakeAction::class])
            ->build()
            ->handle($request);

        $this->assertEquals("2025-12-05 12:00:00", (string) $response->getBody());
    }
}
