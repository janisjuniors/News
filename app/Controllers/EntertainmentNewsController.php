<?php

namespace App\Controllers;

use App\Services\ShowAllCategoryArticlesService;
use App\View;

class EntertainmentNewsController
{
    private array $articles;

    public function __construct(ShowAllCategoryArticlesService $articles)
    {
        $this->articles = $articles->getAll('entertainment');
    }

    public function show(): View
    {
        return new View('news-view.twig', ['newsArticles' => $this->articles, 'pageTitle' => 'Izklaide']);
    }
}
