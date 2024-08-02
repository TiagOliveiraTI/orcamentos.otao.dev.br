<?php

declare(strict_types=1);

namespace Core\Domain\Repository;

use Core\Domain\Entity\ServiceType;

interface ServiceTypeRepositoryInterface
{
    public function insert(ServiceType $serviceType): ServiceType;
    public function update(ServiceType $serviceType): ServiceType;
    public function findById(string $id): ServiceType;
    public function delete(string $id): bool;
    public function toServiceType(object $data): ServiceType;
    public function findAll(string $filter = '', $order = 'DESC'): array;
    public function paginate(string $filter = '', $order = 'DESC', int $page = 1, int $totalPerPage = 15): array;

}
