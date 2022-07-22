<?php

namespace Core\Domain\Entity;

use Core\Domain\Entity\Trait\MagicMethodsTrait;

class Category
{
    use MagicMethodsTrait;

    public function __construct(
        protected string $id = '',
        protected string $name,
        protected string $description = '',
        protected bool $isActive = true
    )
    {
        $this->name = $name;
        $this->description = $description;
        $this->isActive = $isActive;
    }
}