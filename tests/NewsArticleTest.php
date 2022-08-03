<?php

test('Should return correct article data', function () {
    $article = new \App\Models\NewsArticle('New Crypto', 'This new crypto is...', 'crypto.com', 'crypto.com/image');

    expect($article->getTitle())->toEqual('New Crypto');
    expect($article->getDescription())->toEqual('This new crypto is...');
    expect($article->getUrl())->toEqual('crypto.com');
    expect($article->getImageUrl())->toEqual('crypto.com/image');
});
