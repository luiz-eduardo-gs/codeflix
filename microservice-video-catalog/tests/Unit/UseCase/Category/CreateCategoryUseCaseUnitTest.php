<?php

namespace Tests\Unit\UseCase\Category;

use Core\Domain\Entity\Category;
use Core\Domain\Repository\CategoryRepositoryInterface;
use Core\UseCase\Category\CreateCategoryUseCase;
use Core\UseCase\DTO\Category\CreateCategoryInputDto;
use Core\UseCase\DTO\Category\CreateCategoryOutputDto;
use PHPUnit\Framework\TestCase;
use Mockery;
use Ramsey\Uuid\Uuid;

class CreateCategoryUseCaseUnitTest extends TestCase
{
    public function testCreateNewCategory()
    {

        $uuid = (string) Uuid::uuid4()->toString();

        $this->entityMock = Mockery::mock(Category::class, [
            $uuid,
            'category name',
        ]);

        /** @var \Mockery\MockInterface|\Mockery\LegacyMockInterface */
        $this->repositoryMock = Mockery::mock(CategoryRepositoryInterface::class);
        $this->repositoryMock->shouldReceive('insert')->andReturn($this->entityMock);

        $this->inputDtoMock = Mockery::mock(CreateCategoryInputDto::class, [
            'category name'
        ]);

        $useCase = new CreateCategoryUseCase($this->repositoryMock);
        $useCaseResponse = $useCase->execute($this->inputDtoMock);

        $this->assertInstanceOf(CreateCategoryOutputDto::class, $useCaseResponse);

        Mockery::close();
    }
}
