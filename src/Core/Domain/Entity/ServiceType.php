<?php

declare(strict_types=1);

namespace Core\Domain\Entity;

use Core\Domain\Entity\Traits\MagicMethodsTrait;
use Core\Domain\Exception\EntityValidationException;

class ServiceType
{
    use MagicMethodsTrait;

    public function __construct(
        protected string $id = '',
        protected string $name = '',
        protected string $description = '',
        protected float $baseCoast = 0,
        protected bool $isActive = true,
    ) {
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
        if (empty($this->name)) {
            throw new EntityValidationException('Name cannot be empty!');
        }

        if (strlen($this->name) < 3 || strlen($this->name) > 30) {
            throw new EntityValidationException('Name is invalid!');
        }
    }
}
