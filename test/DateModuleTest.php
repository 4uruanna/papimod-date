<?php

namespace Papimod\Date\Test;

use Papi\enumerator\HttpMethod;
use Papi\PapiBuilder;
use Papi\Test\mock\FooGet;
use Papi\Test\PapiTestCase;
use Papimod\Date\DateModule;
use Papimod\Dotenv\DotEnvModule;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(DateModule::class)]
final class DateModuleTest extends PapiTestCase
{
    private PapiBuilder $builder;

    public function setUp(): void
    {
        parent::setUp();
        defined("PAPI_DOTENV_DIRECTORY") || define("PAPI_DOTENV_DIRECTORY", __DIR__);
        defined("PAPI_DOTENV_FILE") || define("PAPI_DOTENV_FILE", ".test.env");
        $this->builder = new PapiBuilder();
        $this->builder->addModule(DotEnvModule::class);
    }

    public function testLoadModule(): void
    {
        $this->builder->addModule(DateModule::class)->build();
        $this->assertEquals(date_default_timezone_get(), DATE_TIMEZONE);
    }

    public function testLoadModuleDefinitions(): void
    {
        $request = $this->createRequest(HttpMethod::GET, "/");

        $response = $this->builder
            ->addAction(FooGet::class)
            ->build()
            ->handle($request);

        $this->assertEquals("foo", (string) $response->getBody());
    }
}
