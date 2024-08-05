<?php

namespace Core\UseCase\DTO\ServiceType;

class ServiceTypeCreateInputDto
{
    public function __construct(
        public string $name,
        public string $description = '',
        public float $base_coast = 0,
        public bool $is_active = true,
    ) {}
}
