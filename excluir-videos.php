<?php 

require 'config.php';
require 'src/Repository/RepositorioVideos.php';
require 'src/Models/Videos.php';

use Alura\Mvc\Entity\Videos;
use Alura\Mvc\Repository\VideoRepository;

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if($id === false){
    header('Location: /?sucesso=0');
    exit;
}

$repositorioVideos = new VideoRepository($pdo);
$result = $repositorioVideos->deletarVideo($id);

if($result === false) {
    header('Location: /?sucesso=1');
} else {
    header('Location: /?sucesso=0');
}