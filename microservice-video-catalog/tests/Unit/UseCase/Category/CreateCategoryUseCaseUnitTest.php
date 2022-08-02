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

        /** @var \Mockery\MockInterface|\Mockery\LegacyMockInterface */
        $this->repositoryMock = Mockery::mock(CategoryRepositoryInterface::class);
        $this->repositoryMock->shouldReceive('insert');

        $useCase = new CreateCategoryUseCase($this->repositoryMock);
        $useCase->execute();

        $this->assertTrue(true);

        Mockery::close();
    }
}
