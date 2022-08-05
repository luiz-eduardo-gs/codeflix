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
        $categoryName = 'category name';

        $this->entityMock = Mockery::mock(Category::class, [
            $uuid,
            $categoryName,
        ]);

        $this->repositoryMock = Mockery::mock(CategoryRepositoryInterface::class);
        $this->repositoryMock->shouldReceive('insert')->andReturn($this->entityMock);

        $this->inputDtoMock = Mockery::mock(CreateCategoryInputDto::class, [
            $categoryName
        ]);

        $useCase = new CreateCategoryUseCase($this->repositoryMock);
        $useCaseResponse = $useCase->execute($this->inputDtoMock);

        $this->assertInstanceOf(CreateCategoryOutputDto::class, $useCaseResponse);
        $this->assertEquals($categoryName, $useCaseResponse->name);
        $this->assertEquals('', $useCaseResponse->description);

        /**
         * Spies
         */
        $this->spy = Mockery::spy(CategoryRepositoryInterface::class);
        $this->spy->shouldReceive('insert')->andReturn($this->entityMock);

        $useCase = new CreateCategoryUseCase($this->spy);
        $useCaseResponse = $useCase->execute($this->inputDtoMock);
        
        $this->spy->shouldHaveReceived('insert');
        
        Mockery::close();
    }
}
