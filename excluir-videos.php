<?php 

require 'config.php';
require 'src/Repository/RepositorioVideos.php';
require 'src/Models/Videos.php';

use Alura\Mvc\Repository\RepositorioVideos;
use Alura\Mvc\Entity\Videos;

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if($id === false){
    header('Location: /?sucesso=0');
    exit;
}

$repositorioVideos = new RepositorioVideos($pdo);
$result = $repositorioVideos->deletarVideo($id);

if($result === false) {
    header('Location: /?sucesso=1');
} else {
    header('Location: /?sucesso=0');
}