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
    private DomainValidation $validator;

    protected function setUp(): void
    {
        $this->validator = new DomainValidation();
    }

    public function testNotNullWithValidValue(): void
    {
        $result = $this->validator->notNull('valid');
        $this->assertSame($this->validator, $result);
    }

    public function testNotNullWithEmptyValue(): void
    {
        $this->expectException(EntityValidationException::class);
        $this->expectExceptionMessage('Should not be empty');
        $this->validator->notNull('');
    }

    public function testNotNullWithCustomExceptionMessage(): void
    {
        $this->expectException(EntityValidationException::class);
        $this->expectExceptionMessage('Custom exception message');
        $this->validator->notNull('', 'Custom exception message');
    }

    public function testStrMaxLengthWithValidValue(): void
    {
        $result = $this->validator->strMaxLength('valid', 5);
        $this->assertSame($this->validator, $result);
    }

    public function testStrMaxLengthWithExceededLength(): void
    {
        $this->expectException(EntityValidationException::class);
        $this->expectExceptionMessage('The max length allowed is 5');
        $this->validator->strMaxLength('exceeded', 5);
    }

    public function testStrMinLengthWithValidValue(): void
    {
        $result = $this->validator->strMinLength('oi', 2);
        $this->assertSame($this->validator, $result);
    }

    public function testStrMinLengthWithShortValue(): void
    {
        $this->expectException(EntityValidationException::class);
        $this->expectExceptionMessage('The min length allowed is 3');
        $this->validator->strMinLength('ab', 3);
    }

    public function testCoastMinValueWithValidValue(): void
    {
        $result = $this->validator->coastMinValue(10.0, 5.0);
        $this->assertSame($this->validator, $result);
    }

    public function testCoastMinValueWithNegativeValue(): void
    {
        $this->expectException(EntityValidationException::class);
        $this->expectExceptionMessage('The base coast cannot be less than 0');
        $this->validator->coastMinValue(-1.0, 5.0);
    }

    public function testCoastMinValueWithLessThanMinValue(): void
    {
        $this->expectException(EntityValidationException::class);
        $this->expectExceptionMessage('The base coast cannot be less than 5');
        $this->validator->coastMinValue(3.0, 5.0);
    }
}
