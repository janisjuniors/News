<?php

namespace App\Controllers;

use App\Services\ShowAllCategoryArticlesService;
use App\View;

class GeneralNewsController
{
    private array $articles;

    public function __construct(ShowAllCategoryArticlesService $articles) {
        $this->articles = $articles->getAll('general');
    }

    public function show(): View
    {
        return new View('news-view.twig', ['newsArticles' => $this->articles, 'pageTitle' => 'Ziņas']);
    }

}
