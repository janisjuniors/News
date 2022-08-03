<?php

namespace App\Repositories;

use App\Models\NewsArticle;

interface ArticleRepository
{
    public function getNewsArticleCollection(string $category): array;
    public function save(NewsArticle $article): void;
}


