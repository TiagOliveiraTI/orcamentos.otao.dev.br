<?php

namespace Core\Domain\Entity;

use Core\Domain\Entity\Traits\MagicMethodsTrait;

class ServiceType
{
    use MagicMethodsTrait;

    public function __construct(
        protected string $id,
        protected string $name,
        protected string $description,
        protected float $baseCoast,
        protected bool $isActive,
    ) {
        
    }
}
