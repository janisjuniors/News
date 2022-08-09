<?php

namespace App\Controllers;

use App\Repositories\UserArticleDataRepository;
use App\Services\AddArticleService;
use App\Services\ShowTodayNamesService;
use App\Services\ShowWeatherTodayService;
use App\Services\StoreArticleServiceRequest;
use App\View;

class UserArticlesController
{
    private AddArticleService $addArticleService;
    private array $repository;
    private array $weatherData;
    private string $todayNames;

    public function __construct(
        AddArticleService $addArticle,
        UserArticleDataRepository $repository,
        ShowWeatherTodayService $weather,
        ShowTodayNamesService $todayNames
    )
    {
        $this->addArticleService = $addArticle;
        $this->repository = $repository->getNewsArticleCollection();
        $this->weatherData = $weather->getWeather();
        $this->todayNames = $todayNames->getTodayNames();
    }

    public function show(): View
    {
        return new View('news-view.twig', [
            'newsArticles' => $this->repository,
            'pageTitle' => 'Lietotāja raksti',
            'weatherAndTime' => $this->weatherData,
            'names' => $this->todayNames
        ]);
    }

    public function create(): View
    {
        return new View('add-article-view.twig', [
            'pageTitle' => 'Pievieno rakstu',
            'postAction' => '/lietotaja-raksti/add',
            'weatherAndTime' => $this->weatherData,
            'names' => $this->todayNames
            ]);
    }

    public function add(): void
    {
        $this->addArticleService->execute(new StoreArticleServiceRequest(
                $_POST['title'],
                $_POST['description'],
                $_POST['url'],
                $_POST['img-url'])
        );

        header('Location: /lietotaja-raksti/pievieno-rakstu');
    }
}
