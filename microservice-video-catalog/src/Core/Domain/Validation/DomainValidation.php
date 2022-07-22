<?php

namespace Core\Domain\Validation;

use Core\Domain\Exception\EntityValidationException;

class DomainValidation
{
    public static function notNull(string $value, ?string $exceptionMessage = null)
    {
        if (empty($value)) {
            throw new EntityValidationException($exceptionMessage ?? 'Should not be empty');
        }
    }

    public static function stringMaxLength(string $value, int $maxLength, ?string $exceptionMessage = null)
    {
        if (strlen($value) > $maxLength) {
            throw new EntityValidationException($exceptionMessage ?? "Value should be lower than $maxLength");
        }
    }

    public static function stringMinLength(string $value, int $minLength, ?string $exceptionMessage = null)
    {
        if (strlen($value) < $minLength) {
            throw new EntityValidationException($exceptionMessage ?? "Value should be greater than $minLength");
        }
    }
}