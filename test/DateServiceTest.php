<?php

namespace Papimod\Date\Test;

use DateTime;
use Papimod\Date\DateModule;
use Papimod\Date\DateService;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Small;
use PHPUnit\Framework\TestCase;

#[CoversClass(DateService::class)]
#[Small]
final class DateServiceTest extends TestCase
{
    private DateService $service;

    public function setUp(): void
    {
        $module = new DateModule();
        $this->service = new DateService();
    }

    public function testToString(): void
    {
        $date = new DateTime('2025-12-05');
        $string = $this->service->dateToString($date);
        $this->assertTrue(str_starts_with($string, '2025-12-05'));
    }

    public function testFromString(): void
    {
        $date = $this->service->dateFromString('2025-12-05 00:00:00');
        $this->assertEquals('2025-12-05', $date->format('Y-m-d'));
    }
}
