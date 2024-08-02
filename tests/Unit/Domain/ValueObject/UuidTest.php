<?php

namespace Tests\Unit\Domain\ValueObject;

use Core\Domain\ValueObject\Uuid;
use InvalidArgumentException;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid as RamseyUuid;

#[CoversClass(Uuid::class)]
class UuidTest extends TestCase
{
    public function testValidUuid(): void
    {
        $uuidString = RamseyUuid::uuid4()->toString();
        $uuid = new Uuid($uuidString);
        $this->assertSame($uuidString, (string)$uuid);
    }

    public function testInvalidUuid(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('does not allow the value');
        new Uuid('invalid-uuid');
    }

    public function testRandomUuid(): void
    {
        $uuid = Uuid::random();
        $this->assertTrue(RamseyUuid::isValid((string)$uuid));
    }
}
