<?php

namespace Core\Domain\Validation;

use Core\Domain\Exception\EntityValidationException;

class DomainValidation
{
    private const MAX_LENGTH = 255;
    private const MIN_LENGTH = 2;

    public static function notNull(string $value, ?string $exceptionMessage = null)
    {
        if (empty($value)) {
            throw new EntityValidationException($exceptionMessage ?? 'Should not be empty');
        }
    }

    public static function stringMaxLength(string $value, int $maxLength = self::MAX_LENGTH, ?string $exceptionMessage = null)
    {
        if (strlen($value) > $maxLength) {
            throw new EntityValidationException($exceptionMessage ?? "Value should be lower than $maxLength");
        }
    }

    public static function stringMinLength(string $value, int $minLength = self::MIN_LENGTH, ?string $exceptionMessage = null)
    {
        if (strlen($value) < $minLength) {
            throw new EntityValidationException($exceptionMessage ?? "Value should be greater than $minLength");
        }
    }

    public static function stringMaxLengthWhenValueNotEmpty(string $value, int $maxLength = self::MAX_LENGTH, ?string $exceptionMessage = null)
    {
        if (!empty($value) && strlen($value) > $maxLength) {
            throw new EntityValidationException($exceptionMessage ?? "Value should be lower than $maxLength");
        }
    }

    public static function stringMinLengthWhenValueNotEmpty(string $value, int $minLength = self::MIN_LENGTH, ?string $exceptionMessage = null)
    {
        if (!empty($value) && strlen($value) < $minLength) {
            throw new EntityValidationException($exceptionMessage ?? "Value should be greater than $minLength");
        }
    }
}