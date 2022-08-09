<?php

namespace App\Models;

class NewsArticle
{
    private string $title;
    private string $description;
    private string $url;
    private string $imageUrl;
    private ?int $id;

    public function __construct(string $title, string $description, string $url, string $imageUrl, ?int $id = null)
    {
        $this->title = $title;
        $this->description = $description;
        $this->url = $url;
        $this->imageUrl = $imageUrl;
        $this->id = $id;
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

    public function getImageUrl(): string
    {
        return $this->imageUrl;
    }

    public function getId(): ?int
    {
        return $this->id;
    }
}

