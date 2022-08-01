<?php

namespace Tests\Unit\UseCase\Category;

use Core\Domain\Repository\CategoryRepositoryInterface;
use Core\UseCase\Category\CreateCategoryUseCase;
use PHPUnit\Framework\TestCase;
use Mockery;
use stdClass;

class CreateCategoryUseCaseUnitTest extends TestCase
{
    public function testCreateNewCategory()
    {
        // $this->entityMock = Mockery::mock(Category::class, [
        //     '1',
        //     'category name'
        // ]);

        $this->repositoryMock = Mockery::mock(stdClass::class, CategoryRepositoryInterface::class);
        $this->repositoryMock->shouldReceive('insert');

        $useCase = new CreateCategoryUseCase($this->repositoryMock);
        $useCase->execute();

        $this->assertTrue(true);

        Mockery::close();
    }
}

