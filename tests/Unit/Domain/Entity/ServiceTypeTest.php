<?php

namespace Tests\Unit\Domain\Entity;

use DomainException;
use PHPUnit\Framework\TestCase;
use Core\Domain\Entity\ServiceType;
use PHPUnit\Framework\Attributes\CoversClass;
use Core\Domain\Exception\EntityValidationException;


#[CoversClass(ServiceType::class)]
#[CoversClass(EntityValidationException::class)]
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
        $uuid = 'uuid.value';

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
    }

    public function testExceptionEmptyName(): void
    {
        $this->expectException(EntityValidationException::class);
        $this->expectExceptionMessage('Name cannot be empty!');

        new ServiceType(
            name: '',
        );
    }

    public function testValidationOnUpdate()
    {
        $serviceType = new ServiceType(name: 'Valid Name');

        $this->expectException(EntityValidationException::class);
        $this->expectExceptionMessage('Name cannot be empty!');

        $serviceType->update('');
    }

    public function testInvalidNameTooShort()
    {
        $this->expectException(EntityValidationException::class);
        $this->expectExceptionMessage('Name is invalid!');

        new ServiceType(name: 'ab');
    }

    public function testInvalidNameTooLong()
    {
        $this->expectException(EntityValidationException::class);
        $this->expectExceptionMessage('Name is invalid!');

        new ServiceType(name: str_repeat('a', 31));
    }
}
