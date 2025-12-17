<?php

namespace Papimod\Date\Test;

use DateTime;
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
        $this->service = new DateService();
    }

    public function testFormat(): void
    {
        $x = '2025-12-05 02:03:04';
        $date = new DateTime($x);
        $string_date = $this->service->format($date);
        $this->assertEquals($x, $string_date);
    }

    public function testParse(): void
    {
        $date = '2025-12-05 02:03:04';
        $a = new DateTime($date);
        $b = $this->service->parse($date);
        $diff = $a->getTimestamp() - $b->getTimestamp();
        $this->assertEquals(0, $diff);
    }

    public function testValidate(): void
    {
        $date = '2025-12-05 02:03:04';
        $valid = $this->service->validate($date);
        $this->assertTrue($valid);

        $date = '2025-12-05 02:03:04:05';
        $valid = $this->service->validate($date);
        $this->assertFalse($valid);

        $date = '0';
        $valid = $this->service->validate($date);
        $this->assertFalse($valid);
    }
}
