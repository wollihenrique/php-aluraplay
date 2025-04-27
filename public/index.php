<?php

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../config.php';

use Alura\Mvc\Controller\DeleteVideoController;
use Alura\Mvc\Repository\VideoRepository;
use Alura\Mvc\Controller\ViewFormController;
use Alura\Mvc\Controller\VideoListController;
use Alura\Mvc\Controller\AddVideoController;
use Alura\Mvc\Controller\UpdateVideoController;

$videoRepository = new VideoRepository($pdo);

if(!array_key_exists('PATH_INFO', $_SERVER) || $_SERVER['PATH_INFO'] === '/') {
    $controller = new VideoListController($videoRepository);
    $controller->processaRequisicao();

} elseif($_SERVER['PATH_INFO'] === '/inserir-videos') {
    if($_SERVER['REQUEST_METHOD'] === 'GET') {
        $controller = new ViewFormController($videoRepository);
        $controller->processaRequisicao();
    } elseif($_SERVER['REQUEST_METHOD'] === 'POST') {
        $controller = new AddVideoController($videoRepository);
        $controller->processaRequisicao();
    }
} elseif($_SERVER['PATH_INFO'] === '/editar-videos') {
    if($_SERVER['REQUEST_METHOD'] === 'GET') {
        $controller = new ViewFormController($videoRepository);
        $controller->processaRequisicao();
    } elseif($_SERVER['REQUEST_METHOD'] === 'POST') {
        $controller = new UpdateVideoController($videoRepository);
        $controller->processaRequisicao();
    }
} elseif($_SERVER['PATH_INFO'] === '/excluir-videos') {
    $controller = new DeleteVideoController($videoRepository);
    $controller->processaRequisicao();
} else {
    http_response_code(404);
}