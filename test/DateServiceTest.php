<?php

namespace Papimod\Date\Test;

use DateTime;
use DateTimeZone;
use Papimod\Date\DateService;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Small;
use PHPUnit\Framework\TestCase;

#[CoversClass(DateService::class)]
#[Small]
final class DateServiceTest extends TestCase
{
    private DateService $service;
    private string $datetime = '2025-12-05 02:03:04';
    private string $date = '2025-12-06';
    private string $time = '03:03:04';

    public function setUp(): void
    {
        $this->service = new DateService();
    }

    public function testFormatDateTime(): void
    {
        $date_time = new DateTime($this->datetime);
        $string_date_time = $this->service->format($date_time);
        $this->assertEquals($this->datetime, $string_date_time);
    }

    public function testParseDateTime(): void
    {
        $date_a = new DateTime($this->datetime);
        $date_b = $this->service->parse($this->datetime);
        $diff = $date_a->getTimestamp() - $date_b->getTimestamp();
        $this->assertEquals(0, $diff);
    }

    public function testValidateDateTime(): void
    {
        $valid = $this->service->validate($this->datetime);
        $this->assertTrue($valid);

        $valid = $this->service->validate('2025-12-05 02:03:04:05');
        $this->assertFalse($valid);

        $valid = $this->service->validate('0');
        $this->assertFalse($valid);
    }

    public function testFormatDate(): void
    {
        $date = new DateTime($this->date);
        $string_date = $this->service->formatDate($date);
        $this->assertEquals($this->date, $string_date);
    }

    public function testParseDate(): void
    {
        $date_a = new DateTime($this->date);
        $date_b = $this->service->parseDate($this->date);
        $diff = $date_a->getTimestamp() - $date_b->getTimestamp();
        $this->assertEquals(0, $diff);
    }

    public function testValidateDate(): void
    {
        $valid = $this->service->validateDate($this->date);
        $this->assertTrue($valid);

        $valid = $this->service->validate('02:03:04');
        $this->assertFalse($valid);

        $valid = $this->service->validate('0');
        $this->assertFalse($valid);
    }

    public function testFormatTime(): void
    {
        $time = new DateTime($this->time);
        $string_time = $this->service->formatTime($time);
        $this->assertEquals($this->time, $string_time);
    }

    public function testParseTime(): void
    {
        $time_a = new DateTime("1970-01-01 " . $this->time);
        $time_b = $this->service->parseTime($this->time);
        $diff = $time_a->getTimestamp() - $time_b->getTimestamp();
        $this->assertEquals(0, $diff);
    }

    public function testValidateTime(): void
    {
        $date_time = '2025-12-05 02:03:04';
        $valid = $this->service->validate($date_time);
        $this->assertTrue($valid);

        $date_time = '2025-12-05 02:03:04:05';
        $valid = $this->service->validate($date_time);
        $this->assertFalse($valid);

        $date_time = '0';
        $valid = $this->service->validate($date_time);
        $this->assertFalse($valid);
    }
}
