<?php

namespace Tests\Unit\Domain\Entity;

use Core\Domain\Entity\Category;
use PHPUnit\Framework\TestCase;

final class CategoryUnitTest extends TestCase
{
    public function testAttributes(): void
    {
        $category = new Category(
            name: 'Category',
            description: 'Description',
            isActive: true,
        );

        $this->assertEquals('Category', $category->name);
        $this->assertEquals('Description', $category->description);
        $this->assertEquals(true, $category->isActive);
    }

    public function testActivated(): void
    {
        $category = new Category(
            name: 'Category',
            isActive: false,
        );

        $category->activate();

        $this->assertTrue($category->isActive);
    }

    public function testDeactivated(): void
    {
        $category = new Category(
            name: 'Category',
        );

        // defaults to true
        $this->assertTrue($category->isActive);

        $category->deactivate();

        $this->assertFalse($category->isActive);
    }
}