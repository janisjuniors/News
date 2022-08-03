<?php

namespace App\Repositories;

use App\Models\NewsArticle;

class UserArticleDataRepository
{
    public function getNewsArticleCollection(): array
    {
        $str = file_get_contents('app/Services/article-data.csv');

        $data = explode("\n", $str);
        $keys = explode(",", array_shift($data));
        $new = [];

        if (count($data) > 0) {
            foreach ($data as $line) {
                $new[] = array_combine($keys, explode("|||", $line));
            }
        }

        $articles = [];
        foreach($new as $userArticle){
            array_unshift($articles, new NewsArticle(
                $userArticle['title'],
                $userArticle['description'],
                $userArticle['url'],
                $userArticle['img-url'],
            ));
        }

        return $articles;
    }

    public function save(NewsArticle $article): void
    {
        $file = fopen('app/Services/article-data.csv', 'a');
        fwrite($file, "\n{$article->getTitle()}|||{$article->getDescription()}|||{$article->getUrl()}|||{$article->getImageUrl()}");
        fclose($file);
    }
}
