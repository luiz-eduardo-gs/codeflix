<?php

namespace Core\Domain\Entity\Trait;

use Exception;

trait MagicMethodsTrait
{
    public function __get($property)
    {
        if (isset($this->{$property}))
            return $this->{$property};
        
        $className = get_class($this);
        throw new Exception("Property {$property} not found in class {$className}");
    }

    public function createdAt(): string
    {
        return $this->createdAt->format('Y-m-d H:i:s');
    }
}