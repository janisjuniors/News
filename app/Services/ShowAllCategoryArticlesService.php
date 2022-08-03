<?php

namespace App\Services;

use App\Repositories\ArticleRepository;

class ShowAllCategoryArticlesService
{
    private ArticleRepository $articleRepository;

    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    public function getAll(string $category): array
    {
        return $this->articleRepository->getNewsArticleCollection($category);
    }
}
