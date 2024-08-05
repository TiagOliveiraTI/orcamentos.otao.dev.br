<?php

namespace Core\UseCase\DTO\ServiceType;

class ServiceTypeCreateOutputDto
{
    public function __construct(
        public string $id,
        public string $name,
        public string $description,
        public float $base_coast,
        public bool $is_active,
        public string $createdAt,
    ) {}
}
