<?php

namespace App\Controllers;

use App\Repositories\UserArticleDataRepository;
use App\Services\AddArticleService;
use App\Services\StoreArticleServiceRequest;
use App\View;

class UserArticlesController
{
    private AddArticleService $addArticleService;
    private array $repository;

    public function __construct(AddArticleService $addArticle, UserArticleDataRepository $repository)
    {
        $this->addArticleService = $addArticle;
        $this->repository = $repository->getNewsArticleCollection('');
    }

    public function show(): View
    {
        return new View('news-view.twig', ['newsArticles' => $this->repository, 'pageTitle' => 'Lietotāja raksti']);
    }

    public function create(): View
    {
        return new View('add-article-view.twig', [
            'pageTitle' => 'Pievieno rakstu',
            'postAction' => '/lietotaja-raksti/add',
            'category' => '/lietotaja-raksti/choose-category']);
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
