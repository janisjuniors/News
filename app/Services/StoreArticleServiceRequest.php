<?php

namespace App\Services;

class StoreArticleServiceRequest
{
    private string $title;
    private string $description;
    private string $url;
    private string $imgURL;

    public function __construct(string $title, string $description, string $url, string $imgURL)
    {
        $this->title = $title;
        $this->description = $description;
        $this->url = $url;
        $this->imgURL = $imgURL;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getImgURL(): string
    {
        return $this->imgURL;
    }
}