<?php

namespace Tests\Unit\Domain\Validation;

use Core\Domain\Exception\EntityValidationException;
use Core\Domain\Validation\DomainValidation;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(DomainValidation::class)]
#[CoversClass(EntityValidationException::class)]
class DomainValidationTest extends TestCase
{
    public function testIfNotNullWithoutMessage()
    {
        $this->expectException(EntityValidationException::class);
        $this->expectExceptionMessage('Should not be empty');

        $domainValidation = new DomainValidation();
        $value = '';

        $domainValidation->notNull($value);

    }

    public function testIfNotNull()
    {
        $this->expectException(EntityValidationException::class);
        $this->expectExceptionMessage('any_message');

        $domainValidation = new DomainValidation();
        $value = '';

        $domainValidation->notNull($value, 'any_message');

    }

    public function testStrMaxLength()
    {
        $domainValidation = new DomainValidation();
        $value = str_repeat('a', 21);
        $maxLength = 20;

        $this->expectException(EntityValidationException::class);
        $this->expectExceptionMessage("The max length allowed is $maxLength");

        $domainValidation->strMaxLength($value, $maxLength);

    }

    public function testStrMinLength()
    {
        $domainValidation = new DomainValidation();
        $value = str_repeat('a', 2);
        $minLength = 3;

        $this->expectException(EntityValidationException::class);
        $this->expectExceptionMessage("The min length allowed is $minLength");

        $domainValidation->strMinLength($value, $minLength);

    }
}
