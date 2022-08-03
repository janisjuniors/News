<?php

namespace App\Controllers;

use App\Services\ShowAllCategoryArticlesService;
use App\View;

class SportsNewsController
{
    private array $articles;

    public function __construct(ShowAllCategoryArticlesService $articles)
    {
        $this->articles = $articles->getAll('sports');
    }

    public function show(): View
    {
        return new View('news-view.twig', ['newsArticles' => $this->articles, 'pageTitle' => 'Sports']);
    }
}


