<?php

require 'config.php';
require 'src/Repository/RepositorioVideos.php';
require 'src/Models/Videos.php';

use Alura\Mvc\Repository\RepositorioVideos;
use Alura\Mvc\Entity\Videos;

$url = filter_input(INPUT_POST, 'url', FILTER_VALIDATE_URL);
if($url === false) {
    header('Location: /?sucesso=0');
    exit;
}
$titulo = filter_input(INPUT_POST, 'titulo');
if($titulo === false) {
    header('Location: /?sucesso=0');
    exit;
}

$repositorioVideos = new RepositorioVideos($pdo);

if($repositorioVideos->criarVideo(new Videos($url, $titulo)) === false){
    header('Location: /?sucesso=0');
} else {
    header('Location: /?sucesso=1');
}