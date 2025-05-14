<?php

use Alura\Mvc\Controller\AddVideoController;
use Alura\Mvc\Controller\DeleteVideoController;
use Alura\Mvc\Controller\LoginController;
use Alura\Mvc\Controller\UpdateVideoController;
use Alura\Mvc\Controller\VideoListController;
use Alura\Mvc\Controller\ViewFormController;
use Alura\Mvc\Controller\LoginFormController;

return [
    'GET|/' => VideoListController::class,
    'GET|/inserir-videos' => ViewFormController::class,
    'POST|/inserir-videos' => AddVideoController::class,
    'GET|/editar-video' => ViewFormController::class,
    'POST|/editar-video' => UpdateVideoController::class,
    'GET|/remover-video' => DeleteVideoController::class,
    'GET|/login' => LoginFormController::class,
    'POST|/login' => LoginController::class,
];
