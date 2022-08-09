<?php

namespace App\Repositories;

interface ArticleRepository
{
    public function getNewsArticleCollection(string $category): array;
}


