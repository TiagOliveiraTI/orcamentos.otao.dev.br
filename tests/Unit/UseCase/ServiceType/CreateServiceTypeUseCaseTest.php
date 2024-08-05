<?php

namespace Tests\Unit\UseCase\ServiceType;

use Mockery;
use PHPUnit\Framework\TestCase;
use Mockery\LegacyMockInterface;
use Core\Domain\ValueObject\Uuid;
use Core\Domain\Entity\ServiceType;
use Core\Domain\Validation\DomainValidation;
use PHPUnit\Framework\Attributes\CoversClass;
use Core\Domain\Repository\ServiceTypeRepositoryInterface;
use Core\UseCase\DTO\ServiceType\ServiceTypeCreateInputDto;
use Core\UseCase\DTO\ServiceType\ServiceTypeCreateOutputDto;
use Otaodev\Orcamentos\Core\UseCase\ServiceType\CreateServiceTypeUseCase;

#[CoversClass(CreateServiceTypeUseCase::class)]
#[CoversClass(Uuid::class)]
#[CoversClass(DomainValidation::class)]
#[CoversClass(ServiceType::class)]
#[CoversClass(ServiceTypeCreateInputDto::class)]
#[CoversClass(ServiceTypeCreateOutputDto::class)]
class CreateServiceTypeUseCaseTest extends TestCase
{
    private ServiceTypeRepositoryInterface|LegacyMockInterface $serviceTypeRepositoryInterfaceMock;
    private ServiceTypeCreateInputDto|LegacyMockInterface $serviceTypeCreateInputDtoMock;

    protected function setUp(): void
    {
        $this->serviceTypeRepositoryInterfaceMock = Mockery::mock(ServiceTypeRepositoryInterface::class);
        $this->serviceTypeCreateInputDtoMock = Mockery::mock(ServiceTypeCreateInputDto::class);
    }

    public function testCreateNewServiceType(): void
    {
        $serviceUuid = Uuid::random()->__toString();
        $serviceTypeName = 'any_name';

        $serviceTypeEntityMock = Mockery::mock(ServiceType::class, [
            $serviceUuid,
            $serviceTypeName
        ]);

        $serviceTypeEntityMock
            ->shouldReceive('createdAt')
            ->andReturn((new \DateTime())->format('Y-m-d H:i:s'));

        $this->serviceTypeRepositoryInterfaceMock
            ->shouldReceive('insert')
            ->once()
            ->with(Mockery::type(ServiceType::class))
            ->andReturn($serviceTypeEntityMock);

        $useCase = new CreateServiceTypeUseCase($this->serviceTypeRepositoryInterfaceMock);

        $this->serviceTypeCreateInputDtoMock = Mockery::mock(ServiceTypeCreateInputDto::class, [
            $serviceTypeName
        ]);
    
        $result = $useCase->execute($this->serviceTypeCreateInputDtoMock);

        $this->assertInstanceOf(ServiceTypeCreateOutputDto::class, $result);

    }

    protected function tearDown(): void
    {
        Mockery::close();
    }
}
