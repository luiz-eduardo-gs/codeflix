<?php

namespace Core\Domain\Entity;

use Core\Domain\Entity\Trait\MagicMethodsTrait;
use Core\Domain\Exception\EntityValidationException;
use Core\Domain\Validation\DomainValidation;
use Core\Domain\ValueObject\Uuid;
use DateTime;

class Category
{
    use MagicMethodsTrait;


    public function __construct(
        protected Uuid|string $id = '',
        protected string $name = '',
        protected string $description = '',
        protected bool $isActive = true,
        protected DateTime|string $createdAt = '',
    ) {
        $this->id = $this->id ? new Uuid($this->id) : Uuid::random();
        $this->createdAt = $this->createdAt ? new DateTime($this->createdAt) : new DateTime();

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
