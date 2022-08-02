<?php

namespace Core\UseCase\Category;

use Core\Domain\Entity\Category;
use Core\Domain\Repository\CategoryRepositoryInterface;
use Core\UseCase\DTO\Category\CreateCategoryInputDto;
use Core\UseCase\DTO\Category\CreateCategoryOutputDto;

class CreateCategoryUseCase
{
    public function __construct(
        private CategoryRepositoryInterface $repository
    ) {
        $this->repository = $repository;
    }

    public function execute(CreateCategoryInputDto $input): CreateCategoryOutputDto
    {
        $category = $this->repository->insert(
            new Category(
                name: $input->name,
                description: $input->description,
                isActive: $input->isActive
            )
        );

        return new CreateCategoryOutputDto(
            id: $category->id,
            name: $category->name,
            description: $category->description,
            is_active: $category->isActive
        );
    }
}
