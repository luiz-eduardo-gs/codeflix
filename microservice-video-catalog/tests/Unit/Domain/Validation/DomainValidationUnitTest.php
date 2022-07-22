<?php

namespace Tests\Unit\Domain\Validation;

use Core\Domain\Exception\EntityValidationException;
use PHPUnit\Framework\TestCase;
use Core\Domain\Validation\DomainValidation;
use Exception;

final class DomainValidationUnitTest extends TestCase
{
    public function testNotNull()
    {
        $this->expectException(EntityValidationException::class);

        DomainValidation::notNull('');
    }

    public function testNotNullCustomMessageException()
    {
        $exceptionMessage = 'Value should not be null';
        $this->expectException(EntityValidationException::class);
        $this->expectExceptionMessage($exceptionMessage);

        DomainValidation::notNull('', $exceptionMessage);
    }

    public function testStringMaxLength()
    {
        $this->expectException(EntityValidationException::class);

        DomainValidation::stringMaxLength('abcd', 3);
    }

    public function testStringMaxLengthCustomMessageException()
    {
        $maxLength = 6;
        $exceptionMessage = "Value should be lower than $maxLength";
        $this->expectException(EntityValidationException::class);
        $this->expectExceptionMessage($exceptionMessage);

        DomainValidation::stringMaxLength('abcdefgh', $maxLength, $exceptionMessage);
    }

    public function testStringMinLength()
    {
        $this->expectException(EntityValidationException::class);

        DomainValidation::stringMinLength('ab', 3);
    }

    public function testStringMinLengthCustomMessageException()
    {
        $minLength = 6;
        $exceptionMessage = "Value should be lower than $minLength";
        $this->expectException(EntityValidationException::class);
        $this->expectExceptionMessage($exceptionMessage);

        DomainValidation::stringminLength('abcd', $minLength, $exceptionMessage);
    }

    public function testStringCanBeNullAndMaxLength()
    {
        $this->expectException(EntityValidationException::class);

        DomainValidation::stringMaxLengthWhenValueNotEmpty('abdc', 2);
    }

    public function testStringCanBeNullAndMaxLengthWithEmptyString()
    {
        $this->expectNotToPerformAssertions();
        DomainValidation::stringMaxLengthWhenValueNotEmpty('', 20);
    }

    public function testStringCanBeNullAndMinLength()
    {
        $this->expectException(EntityValidationException::class);

        DomainValidation::stringMinLengthWhenValueNotEmpty('a', 2);
    }

    public function testStringCanBeNullAndMinLengthWithEmptyString()
    {
        $this->expectNotToPerformAssertions();
        DomainValidation::stringMinLengthWhenValueNotEmpty('', 20);
    }
}
