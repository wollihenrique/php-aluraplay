<?php 

require "config.php";

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if($id === false){
    header('Location: /?sucesso=0');
    exit;
}

$sql = 'DELETE FROM videos WHERE id = ?;';
$statement = $pdo->prepare($sql);
$statement->bindValue(1, $id);

if ($statement->execute() === false){
    header('Location: /?sucesso=0');
} else {
    header('Location: /?sucesso=1');
}