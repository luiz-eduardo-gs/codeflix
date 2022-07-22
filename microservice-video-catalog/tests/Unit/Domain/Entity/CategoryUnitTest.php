<?php

namespace Tests\Unit\Domain\Entity;

use Core\Domain\Entity\Category;
use Core\Domain\Exception\EntityValidationException;
use PHPUnit\Framework\TestCase;

final class CategoryUnitTest extends TestCase
{
    public function testAttributes()
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

    public function testActivated()
    {
        $category = new Category(
            name: 'Category',
            isActive: false,
        );

        $category->activate();

        $this->assertTrue($category->isActive);
    }

    public function testDeactivated()
    {
        $category = new Category(
            name: 'Category',
        );

        // defaults to true
        $this->assertTrue($category->isActive);

        $category->deactivate();

        $this->assertFalse($category->isActive);
    }

    public function testUpdate()
    {
        $uuid = 'uuid.value';

        $category = new Category(
            id: $uuid,
            name: 'Category',
            description: 'Desc',
            isActive: true,
        );

        $category->update(
            name: 'updated_category',
            description: 'updated_description'
        );

        $this->assertEquals('updated_category', $category->name);
        $this->assertEquals('updated_description', $category->description);
    }

    public function testUpdateWithoutDescription()
    {
        $uuid = 'uuid.value';

        $category = new Category(
            id: $uuid,
            name: 'Category',
            description: 'Desc',
            isActive: true,
        );

        $category->update(name: 'updated_category');

        $this->assertEquals('updated_category', $category->name);
        $this->assertEquals('Desc', $category->description);
    }

    public function testNameValidation()
    {
        $this->expectException(EntityValidationException::class);

        $category = new Category(
            name: '',
            description: 'Desc',
            isActive: true,
        );

    }

    public function testDescriptionValidation()
    {
        $this->expectException(EntityValidationException::class);

        $category = new Category(
            name: 'Category',
            description: 'D',
            isActive: true,
        );
    }
}