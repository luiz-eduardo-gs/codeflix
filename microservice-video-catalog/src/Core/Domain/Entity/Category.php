<?php

namespace Core\Domain\Entity;

use Core\Domain\Entity\Trait\MagicMethodsTrait;
use Core\Domain\Exception\EntityValidationException;
use Core\Domain\Validation\DomainValidation;

class Category
{
    use MagicMethodsTrait;

    public function __construct(
        protected string $id = '',
        protected string $name = '',
        protected string $description = '',
        protected bool $isActive = true
    )
    {
        $this->name = $name;
        $this->description = $description;
        $this->isActive = $isActive;
        $this->validate();
    }

    public function activate(): void
    {
        $this->isActive = true;
    }

    public function deactivate(): void
    {
        $this->isActive = false;
    }

    public function update(string $name, string $description = ''): void
    {
        $this->name = $name;
        
        if ($description !== '') {
            $this->description = $description;
        }

        $this->validate();
    }

    private function validate()
    {
        DomainValidation::stringMinLength(
            value: $this->name,
            exceptionMessage: "Category name should have at least 3 characters",
        );
        DomainValidation::stringMaxLength(
            value: $this->name,
            exceptionMessage: "Category name should have less than 255 characters",
        );

        DomainValidation::stringMinLengthWhenValueNotEmpty(
            value: $this->description,
            exceptionMessage: "Category description should have at least 2 characters",
        );
        DomainValidation::stringMaxLengthWhenValueNotEmpty(
            value: $this->description,
            exceptionMessage: "Category description should have less than 255 characters",
        );
    }
}