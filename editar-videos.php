<?php

require 'config.php';

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

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if($id === false){
    header('Location: /?sucesso=0');
    exit;
}

$sql = 'DELETE FROM videos WHERE id = ?;';
$statement = $pdo->prepare($sql);
$statement->bindValue(1, $id);

$sql = 'UPDATE videos SET url = :url, titulo = :titulo WHERE id = :id;';
$statement = $pdo->prepare($sql);
$statement->bindValue(':url', $url);
$statement->bindValue(':titulo', $titulo);
$statement->bindValue(':id', $id);

if ($statement->execute() === false){
    header('Location: /?sucesso=0');
} else {
    header('Location: /?sucesso=1');
}