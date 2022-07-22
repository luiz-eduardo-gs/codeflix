<?php

namespace Tests\Unit\Domain\Entity;

use Core\Domain\Entity\Category;
use PHPUnit\Framework\TestCase;

final class CategoryUnitTest extends TestCase
{
    public function testAttributes()
    {
        $category = new Category(
            id: '123',
            name: 'Category',
            description: 'Description',
            isActive: true,
        );

        $this->assertEquals('Category', $category->name);
        $this->assertEquals('Description', $category->description);
        $this->assertEquals(true, $category->isActive);
    }
}