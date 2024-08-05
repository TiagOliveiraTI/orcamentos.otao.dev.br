<?php

declare(strict_types=1);

namespace Otaodev\Orcamentos\Core\UseCase\ServiceType;

use Core\Domain\Entity\ServiceType;
use Core\Domain\Repository\ServiceTypeRepositoryInterface;
use Core\UseCase\DTO\ServiceType\ServiceTypeCreateInputDto;
use Core\UseCase\DTO\ServiceType\ServiceTypeCreateOutputDto;

class CreateServiceTypeUseCase
{
    public function __construct(
        private ServiceTypeRepositoryInterface $serviceTypeRepositoryInterface
    ) {}

    public function execute(ServiceTypeCreateInputDto $inputDto): ServiceTypeCreateOutputDto
    {
        $serviceType = new ServiceType(
            name: $inputDto->name,
            description: $inputDto->description,
            baseCoast: $inputDto->base_coast,
            isActive: $inputDto->is_active,
        );

        $newServiceType = $this->serviceTypeRepositoryInterface->insert($serviceType);


        return new ServiceTypeCreateOutputDto(
            (string) $newServiceType->id,
            $newServiceType->name,
            $newServiceType->description,
            $newServiceType->baseCoast,
            $newServiceType->isActive,
            $newServiceType->createdAt(),
        );
    }
}
