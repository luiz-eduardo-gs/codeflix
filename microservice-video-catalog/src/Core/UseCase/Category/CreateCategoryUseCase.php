<?php

namespace Core\UseCase\Category;

use Core\Domain\Entity\Category;
use Core\Domain\Repository\CategoryRepositoryInterface;

class CreateCategoryUseCase
{
    public function __construct(
        private CategoryRepositoryInterface $repository
    ) {
        $this->repository = $repository;
    }

    public function execute()
    {
        $category = new Category(
            name: 'teste'
        );

        $this->repository->insert($category);
    }
}
