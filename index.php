<?php

use App\Repositories\NewsAPIArticleRepository;
use App\View;

require_once 'vendor/autoload.php';

$env = Dotenv\Dotenv::createImmutable(__DIR__);
$env->load();

$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/', 'App\Controllers\GeneralNewsController@show');

    $r->addRoute('GET', '/lietotaja-raksti', 'App\Controllers\UserArticlesController@show');
    $r->addRoute('GET', '/lietotaja-raksti/pievieno-rakstu', 'App\Controllers\UserArticlesController@create');
    $r->addRoute('POST', '/lietotaja-raksti/add', 'App\Controllers\UserArticlesController@add');

    $r->addRoute('GET', '/zinatne', 'App\Controllers\ScienceNewsController@show');
    $r->addRoute('GET', '/veseliba', 'App\Controllers\HealthNewsController@show');
    $r->addRoute('GET', '/sports', 'App\Controllers\SportsNewsController@show');
    $r->addRoute('GET', '/bizness', 'App\Controllers\BusinessNewsController@show');
    $r->addRoute('GET', '/izklaide', 'App\Controllers\EntertainmentNewsController@show');
});

$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);

switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        var_dump('404 Not Found');
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        var_dump('405 Method Not Allowed');
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];

        [$controller, $method] = explode('@', $handler);

        $container = new DI\Container();
        $container->set(\App\Repositories\ArticleRepository::class, \DI\create(NewsAPIArticleRepository::class));

        $view = ($container->get($controller))->$method();

        /*
        echo "<pre>";
        var_dump($container);
        */

        $loader = new \Twig\Loader\FilesystemLoader('app/View');
        $twig = new \Twig\Environment($loader);

        if ($view) {
            /** @var View $view */
            $template = $twig->load($view->getTemplatePath());
            echo $template->render($view->getData());
        }

        break;
}