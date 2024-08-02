<?php

namespace Tests\Unit\Domain\Entity;

use DomainException;
use PHPUnit\Framework\TestCase;
use Core\Domain\Entity\ServiceType;
use PHPUnit\Framework\Attributes\CoversClass;
use Core\Domain\Exception\EntityValidationException;
use Core\Domain\Validation\DomainValidation;
use Core\Domain\ValueObject\Uuid;

#[CoversClass(ServiceType::class)]
#[CoversClass(DomainValidation::class)]
#[CoversClass(EntityValidationException::class)]
#[CoversClass(Uuid::class)]
class ServiceTypeTest extends TestCase
{
    public function testAttributes(): void
    {
        $serviceType = new ServiceType(
            id: '',
            name: 'nome_servico',
            description: 'Novo tipo de serviço',
            baseCoast: 3.99,
            isActive: true,
        );

        $this->assertSame('nome_servico', $serviceType->name);
        $this->assertSame('Novo tipo de serviço', $serviceType->description);
        $this->assertSame(3.99, $serviceType->baseCoast);
        $this->assertTrue($serviceType->isActive);
    }

    public function testGetNonExistingPropertyThrowsException()
    {
        $this->expectException(DomainException::class);
        $this->expectExceptionMessage('Property nonExistingProperty not found in class Core\Domain\Entity\ServiceType!');

        $serviceType = new ServiceType(
            name: 'nome_servico',
            description: 'Novo tipo de serviço',
            baseCoast: 3.99,
            isActive: true,
        );
        
        $serviceType->__get('nonExistingProperty');
    }

    public function testServiceTypeInitializationWithDefaultValues(): void
    {
        $serviceType = new ServiceType(name: 'ServiceName');

        $this->assertNotEmpty($serviceType->id);
        $this->assertEquals('ServiceName', $serviceType->name);
        $this->assertEmpty($serviceType->description);
        $this->assertEquals(0, $serviceType->baseCoast);
        $this->assertTrue($serviceType->isActive);
    }

    public function testServiceTypeInitializationWithCustomValues(): void
    {
        $uuid = (string) Uuid::random()->__toString();

        $serviceType = new ServiceType($uuid, 'ServiceName', 'Description', 10.5, false);

        $this->assertEquals($uuid, $serviceType->id);
        $this->assertEquals('ServiceName', $serviceType->name);
        $this->assertEquals('Description', $serviceType->description);
        $this->assertEquals(10.5, $serviceType->baseCoast);
        $this->assertFalse($serviceType->isActive);
    }

    public function testInvalidBaseCoastShouldThrowException(): void
    {
        $this->expectException(EntityValidationException::class);
        $this->expectExceptionMessage('The base coast cannot be less than 0');

        $uuid = (string) Uuid::random()->__toString();

        new ServiceType($uuid, 'ServiceName', 'Description', -10.5, true);
    }

    public function testActivated(): void
    {
        $serviceType = new ServiceType(
            name: 'nome_servico',
            isActive: false
        );

        $this->assertFalse($serviceType->isActive);
        $serviceType->activate();
        $this->assertTrue($serviceType->isActive);

    }

    public function testDisabled(): void
    {
        $serviceType = new ServiceType(
            name: 'nome_servico',
        );

        $this->assertTrue($serviceType->isActive);
        $serviceType->disable();
        $this->assertFalse($serviceType->isActive);
        
    }

    public function testUpdate(): void
    {
        $uuid = (string) Uuid::random()->__toString();

        $serviceType = new ServiceType(
            id: $uuid,
            name: 'nome_servico',
            description: 'Novo tipo de serviço',
            baseCoast: 3.99,
            isActive: true,
        );


        $serviceType->update(
            name: 'new_name',
            description: 'new_description',
            baseCoast: 10.5,
        );

        $this->assertSame('new_name', $serviceType->name);
        $this->assertSame('new_description', $serviceType->description);
        $this->assertSame(10.5, $serviceType->baseCoast);
    }

    public function testExceptionEmptyName(): void
    {
        $this->expectException(EntityValidationException::class);
        $this->expectExceptionMessage('Should not be empty');

        new ServiceType(
            name: '',
        );
    }

    public function testValidationOnUpdate()
    {
        $serviceType = new ServiceType(name: 'Valid Name');

        $this->expectException(EntityValidationException::class);
        $this->expectExceptionMessage('Should not be empty');

        $serviceType->update(name: '', baseCoast: 0);
    }

    public function testInvalidNameTooShort()
    {
        $this->expectException(EntityValidationException::class);
        $this->expectExceptionMessage('The min length allowed is 3');

        new ServiceType(name: 'ab');
    }

    public function testInvalidNameTooLong()
    {
        $this->expectException(EntityValidationException::class);
        $this->expectExceptionMessage('The max length allowed is 20');

        new ServiceType(name: str_repeat('a', 31));
    }

    public function testShouldThrowExceptionIfBaseCoastIsLessThan0()
    {
        $serviceType = new ServiceType(name: 'Nome do Serviço');

        $this->expectException(EntityValidationException::class);
        $this->expectExceptionMessage('The base coast cannot be less than 0');
    
        $serviceType->update(name: 'Nome do Serviço', description: 'Descrição', baseCoast: -10);
    }

}
