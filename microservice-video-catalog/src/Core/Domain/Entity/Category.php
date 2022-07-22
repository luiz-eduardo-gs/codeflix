<?php

namespace Core\Domain\Entity;

use Core\Domain\Entity\Trait\MagicMethodsTrait;
use Core\Domain\Exception\EntityValidationException;

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
        if (strlen($this->name) <= 3) {
            throw new EntityValidationException("Category name should have at least 3 characters");
        }

        if (
            $this->description !== '' && (strlen($this->description) <= 3 || strlen($this->description) > 255)) {
            throw new EntityValidationException("Category description should have at least 3 characters");
        }
    }
}