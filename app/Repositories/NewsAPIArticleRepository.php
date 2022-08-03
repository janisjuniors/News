<?php

namespace App\Repositories;

use App\Models\NewsArticle;

class NewsAPIArticleRepository implements ArticleRepository
{
    private const API_URL = 'https://newsapi.org';

    public function getNewsArticleCollection(string $category): array
    {
        $client = new \GuzzleHttp\Client([
            'base_uri' => self::API_URL
        ]);

        $response = $client->request('GET', 'v2/top-headlines', [
            'query' => [
                'country' => 'lv',
                'category' => $category,
                'apiKey' => $_ENV['API_KEY']
            ]
        ]);

        $news = json_decode($response->getBody());

        $articles = [];
        foreach ($news->articles as $article) {
            $imgURl = $article->urlToImage;
            if ($article->urlToImage === null) {
                $imgURl = 'https://its.fsu.edu/sites/g/files/upcbnu1011/files/ITS%20Website/no-image-available.png';
            }

            $articles[] = new NewsArticle(
                (string)$article->title,
                (string)$article->description,
                (string)$article->url,
                (string)$imgURl
            );
        }

        return $articles;
    }

    public function save(NewsArticle $article): void
    {

    }
}
