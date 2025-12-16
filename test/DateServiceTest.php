<?php

namespace Papimod\Date\Test;

use DateTime;
use Papimod\Date\DateService;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Depends;
use PHPUnit\Framework\Attributes\Small;
use PHPUnit\Framework\TestCase;

#[CoversClass(DateService::class)]
#[Small]
final class DateServiceTest extends TestCase
{
    private DateService $service;

    public function setUp(): void
    {
        $this->service = new DateService();
    }

    public function testToString(): void
    {
        $date = new DateTime('2025-12-05');
        $string = $this->service->toString($date);
        $this->assertTrue(str_starts_with($string, '2025-12-05'));
    }

    #[Depends('testToString')]
    public function testFromString(): void
    {
        $date = $this->service->fromString('2025-12-05 02:03:04');
        $string = $this->service->toString($date);
        $this->assertEquals('2025-12-05 02:03:04', $string);
    }
}
