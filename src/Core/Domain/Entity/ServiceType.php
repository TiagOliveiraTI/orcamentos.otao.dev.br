<?php

declare(strict_types=1);

namespace Core\Domain\Entity;

use Core\Domain\Entity\Traits\MagicMethodsTrait;

use Core\Domain\Validation\DomainValidation;

class ServiceType
{
    private DomainValidation $domainValidation;

    use MagicMethodsTrait;

    public function __construct(
        private string $id = '',
        private string $name = '',
        private string $description = '',
        private float $baseCoast = 0,
        private bool $isActive = true,
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

    public function update(string $name, float $baseCoast, string $description = ''): void
    {
        $this->name = $name;
        $this->description = $description;
        $this->baseCoast = $baseCoast;

        $this->validate();
    }

    private function validate()
    {
        $this->domainValidation
            ->notNull($this->name)
            ->strMinLength($this->name, 3)
            ->strMaxLength($this->name, 20)
            ->coastMinValue($this->baseCoast)
        ;
    }
}
