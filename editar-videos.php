<?php

require 'config.php';
require 'src/Models/Videos.php';
require 'src/Repository/RepositorioVideos.php';

use Alura\Mvc\Repository\RepositorioVideos;
use Alura\Mvc\Entity\Videos;

$repositorioVideos = new RepositorioVideos($pdo);

$url = filter_input(INPUT_POST, 'url', FILTER_VALIDATE_URL);
if($url === false) {
    header('Location: /?sucesso=0');
    exit;
}

$titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_STRING);
if($titulo === false || $titulo === null) {
    header('Location: /?sucesso=0');
    exit;
}

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if($id === false){
    header('Location: /?sucesso=0');
    exit;
}


$video = new Videos( $url, $titulo);
$video->setId($id);

if ($repositorioVideos->atualizarVideo($video) === true) {
    header('Location: /?sucesso=1');
    exit;
} else {
    header('Location: /?sucesso=0');
    exit;
}