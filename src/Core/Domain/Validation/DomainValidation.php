<?php

namespace Core\Domain\Validation;

use Core\Domain\Exception\EntityValidationException;

class DomainValidation
{
    public function notNull(string $value, string $exceptionMessage = null)
    {
        if (empty($value)) {
            throw new EntityValidationException($exceptionMessage ?? 'Should not be empty');
        }

        return $this;
    }

    public function strMaxLength(string $value, int $maxValue = 255)
    {
        if (strlen($value) > $maxValue) {
            throw new EntityValidationException("The max length allowed is $maxValue");
        }

        return $this;
    }

    public function strMinLength(string $value, int $minValue = 255)
    {
        if (strlen($value) <= $minValue) {
            throw new EntityValidationException("The min length allowed is $minValue");
        }

        return $this;
    }
}
