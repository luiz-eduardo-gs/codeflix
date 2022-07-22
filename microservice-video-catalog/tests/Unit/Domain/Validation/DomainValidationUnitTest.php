<?php

namespace Tests\Unit\Domain\Validation;

use Core\Domain\Exception\EntityValidationException;
use PHPUnit\Framework\TestCase;
use Core\Domain\Validation\DomainValidation;

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
}