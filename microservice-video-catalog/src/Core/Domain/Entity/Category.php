<?php

namespace Core\Domain\Entity;

use Core\Domain\Entity\Trait\MagicMethodsTrait;

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
    }
}