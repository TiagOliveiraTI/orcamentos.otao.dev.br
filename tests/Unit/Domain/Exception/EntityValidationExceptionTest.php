<?php

namespace Tests\Unit\Domain\Exception;

use PHPUnit\Framework\TestCase;
use Core\Domain\Exception\EntityValidationException;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(EntityValidationException::class)]
class EntityValidationExceptionTest extends TestCase
{
    public function testExceptionMessage()
    {
        $this->expectException(EntityValidationException::class);
        $this->expectExceptionMessage('Invalid entity data');

        throw new EntityValidationException('Invalid entity data');
    }
}
