<?php

declare(strict_types=1);

namespace Core\Domain\Entity;

use Core\Domain\Entity\Traits\MagicMethodsTrait;
use Core\Domain\Exception\EntityValidationException;
use Core\Domain\Validation\DomainValidation;

class ServiceType
{
    private DomainValidation $domainValidation;
    use MagicMethodsTrait;

    public function __construct(
        protected string $id = '',
        protected string $name = '',
        protected string $description = '',
        protected float $baseCoast = 0,
        protected bool $isActive = true,
    ) {
        $this->domainValidation = new DomainValidation();

        $this->validate();
    }

    public function activate(): void
    {
        $this->isActive = true;
    }

    public function disable(): void
    {
        $this->isActive = false;
    }

    public function update(string $name, string $description = '', float $baseCoast = 0): void
    {
        $this->name = $name;
        $this->description = $description;
        $this->baseCoast = $baseCoast;

        $this->validate();
    }

    public function validate()
    {
        $this->domainValidation->notNull($this->name)
            ->strMaxLength($this->name, 20)
            ->strMinLength($this->name, 2);
    }
}
