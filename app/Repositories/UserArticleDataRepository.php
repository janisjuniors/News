<?php

namespace App\Repositories;

use App\Models\NewsArticle;

class UserArticleDataRepository
{
    public function getNewsArticleCollection(): array
    {
        $connectionParams = [
            'dbname' => 'news_page',
            'user' => 'userj',
            'password' => '2085',
            'host' => 'localhost',
            'driver' => 'pdo_mysql',
        ];
        $conn = \Doctrine\DBAL\DriverManager::getConnection($connectionParams);
        $articlesSQL = $conn->fetchAllAssociative('SELECT * FROM articles');

        $articles = [];
        foreach($articlesSQL as $userArticle){
            array_unshift($articles, new NewsArticle(
                $userArticle['title'],
                $userArticle['description'],
                $userArticle['url'],
                $userArticle['img_url'],
            ));
        }
        return $articles;
    }

    public function save(NewsArticle $article): void
    {
        $connectionParams = [
            'dbname' => 'news_page',
            'user' => 'userj',
            'password' => '2085',
            'host' => 'localhost',
            'driver' => 'pdo_mysql',
        ];
        $conn = \Doctrine\DBAL\DriverManager::getConnection($connectionParams);

        $conn->insert('articles', [
            'title' => $article->getTitle(),
            'description' => $article->getDescription(),
            'url' => $article->getUrl(),
            'img_url' => $article->getImageUrl()
        ]);
    }
}
