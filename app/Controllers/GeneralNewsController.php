<?php

namespace App\Controllers;

use App\Services\ShowAllCategoryArticlesService;
use App\Services\ShowTodayNamesService;
use App\Services\ShowWeatherTodayService;
use App\View;

class GeneralNewsController
{
    private array $articles;
    private array $weatherData;
    private string $todayNames;

    public function __construct(
        ShowAllCategoryArticlesService $articles, ShowWeatherTodayService $weather, ShowTodayNamesService $todayNames) {
        $this->articles = $articles->getAll('general');
        $this->weatherData = $weather->getWeather();
        $this->todayNames = $todayNames->getTodayNames();
    }

    public function show(): View
    {
        return new View('news-view.twig', [
            'newsArticles' => $this->articles,
            'pageTitle' => 'Ziņas',
            'weatherAndTime' => $this->weatherData,
            'names' => $this->todayNames
        ]);
    }

}
