<?php

namespace App\Services;

use App\Models\NewsArticle;
use App\Repositories\UserArticleDataRepository;

class AddArticleService
{
    private UserArticleDataRepository $userArticleDataRepository;

    public function __construct(UserArticleDataRepository $userArticleDataRepository)
    {
        $this->userArticleDataRepository = $userArticleDataRepository;
    }

    public function execute(StoreArticleServiceRequest $request): void
    {
        $article = new NewsArticle(
            $request->getTitle(),
            $request->getDescription(),
            $request->getUrl(),
            $request->getImgURL()
        );

        $this->userArticleDataRepository->save($article);
    }

}