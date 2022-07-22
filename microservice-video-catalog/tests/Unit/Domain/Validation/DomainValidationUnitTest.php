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
        $this->expectException(EntityValidationException::class);
        $exceptionMessage = 'Value should not be null';

        DomainValidation::notNull('', $exceptionMessage);
    }
}