<?php

namespace Core\Domain\Entity\Traits;

use DomainException;

trait MagicMethodsTrait
{
    public function __get($property)
    {
        if (!property_exists($this, $property)) {
            $className = get_class($this);
            throw new DomainException("Property $property not found in class $className!");
        }

        return $this->{$property};
    }

    public function createdAt(string $format = 'Y-m-d H:i:s'): string
    {
        return $this->createdAt->format($format);
    }
}
