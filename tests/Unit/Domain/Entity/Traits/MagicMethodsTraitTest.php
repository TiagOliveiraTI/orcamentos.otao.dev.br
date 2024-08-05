<?php

namespace Tests\Unit\Domain\Entity\Traits;

use PHPUnit\Framework\TestCase;
use Core\Domain\ValueObject\Uuid;
use Core\Domain\Entity\ServiceType;
use Core\Domain\Entity\Traits\MagicMethodsTrait;
use Core\Domain\Validation\DomainValidation;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\CoversTrait;

#[CoversTrait(MagicMethodsTrait::class)]
#[CoversClass(ServiceType::class)]
#[CoversClass(DomainValidation::class)]
#[CoversClass(Uuid::class)]
class MagicMethodsTraitTest extends TestCase
{
    public function testMagicMethodsTraitIdMethodVisibility(): void
    {
        $createdAt = '2023-01-01 00:00:00';
        $serviceType = new ServiceType(Uuid::random()->__toString(), 'Service Name', 'Service Description', 100.0, true, $createdAt);

        $this->assertTrue((new \ReflectionMethod($serviceType, 'id'))->isPublic(), 'The id method should be public');
    }

    public function testMagicMethodsTraitIdMethodReturnType(): void
    {
        $createdAt = '2023-01-01 00:00:00';
        $uuid = Uuid::random()->__toString();
        $serviceType = new ServiceType($uuid, 'Service Name', 'Service Description', 100.0, true, $createdAt);
        $this->assertIsString($serviceType->id());
        $this->assertEquals((string)$uuid, $serviceType->id());
    }
}
