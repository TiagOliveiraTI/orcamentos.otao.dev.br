<?php

declare(strict_types=1);

namespace Core\Domain\Validation;

use Core\Domain\Exception\EntityValidationException;

readonly class DomainValidation
{
    public function notNull(string $value, string $exceptionMessage = null): self
    {
        if (empty($value)) {
            throw new EntityValidationException($exceptionMessage ?? 'Should not be empty');
        }

        return $this;
    }

    public function strMaxLength(string $value, int $maxValue): self
    {
        if ($maxValue < strlen($value)) {
            throw new EntityValidationException("The max length allowed is $maxValue");
        }

        return $this;
    }

    public function strMinLength(string $value, int $minValue): self
    {
        if (strlen($value) < $minValue) {
            throw new EntityValidationException("The min length allowed is $minValue");
        }

        return $this;
    }

    public function coastMinValue(float $value, float $minValue = 0.0): self
    {
        if ($value < 0) {
            throw new EntityValidationException("The base coast cannot be less than 0");
        }

        if ($value < $minValue) {
            throw new EntityValidationException("The base coast cannot be less than $minValue");
        }

        return $this;
    }
}

