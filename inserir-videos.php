<?php

require 'config.php';
require 'src/Repository/RepositorioVideos.php';
require 'src/Models/Videos.php';

if(isset($_POST['url']) && isset($_POST['titulo'])) {
    $video = new Videos( null, $_POST['url'], $_POST['titulo']);
    $repositorioVideos = new repositorioVideos($pdo);

    if($repositorioVideos->criarVideo($video) === true) {
        header('Location: /?sucesso=1');
    } else {
        header('Location: /?sucesso=0');
    }
} else {
    header('Location: /?sucesso=0');
}


// $url = filter_input(INPUT_POST, 'url', FILTER_VALIDATE_URL);
// if($url === false) {
//     header('Location: /?sucesso=0');
//     exit;
// }

// $titulo = filter_input(INPUT_POST, 'titulo');
// if($titulo === false) {
//     header('Location: /?sucesso=0');
//     exit;
// }

// $sql = "INSERT INTO videos (url, titulo) VALUES (?, ?);";
// $statement = $pdo->prepare($sql);
// $statement->bindValue(1, $url);
// $statement->bindValue(2, $titulo);

// if($statement->execute() === false){
//     header('Location: /?sucesso=0');
// } else {
//     header('Location: /?sucesso=1');
// }