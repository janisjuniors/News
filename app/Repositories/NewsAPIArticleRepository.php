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
                'apiKey' => $_ENV['API_KEY_NEWS']
            ]
        ]);

        $news = json_decode($response->getBody());

        $articles = [];
        foreach ($news->articles as $article) {
            if ($article->urlToImage) {
                $articles[] = new NewsArticle(
                    (string)$article->title,
                    (string)$article->description,
                    (string)$article->url,
                    (string)$article->urlToImage
                );
            }
        }
        return $articles;
    }
}
