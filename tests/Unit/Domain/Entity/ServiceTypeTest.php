<?php

namespace Tests\Unit\Domain\Entity;

use Core\Domain\Entity\ServiceType;
use DomainException;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;


#[CoversClass(ServiceType::class)]
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
            id: 'any_id',
            name: 'nome_servico',
            description: 'Novo tipo de serviço',
            baseCoast: 3.99,
            isActive: true,
        );
        
        $serviceType->__get('nonExistingProperty');
    }
}