<?php

require "config.php";

$url = filter_input(INPUT_POST, 'url', FILTER_VALIDATE_URL);
if($url === false) {
    header('Location: /?sucesso=0');
    exit;
}

$titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_STRING);
if($titulo === false) {
    header('Location: /?sucesso=0');
    exit;
}

$sql = "INSERT INTO videos (url, titulo) VALUES (?, ?);";
$statement = $pdo->prepare($sql);
$statement->bindValue(1, $url);
$statement->bindValue(2, $titulo);

if($statement->execute() === false){
    header('Location: /?sucesso=0');
} else {
    header('Location: /?sucesso=1');
}