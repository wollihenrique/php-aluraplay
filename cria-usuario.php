<?php

require_once __DIR__ . '/config.php';

$email = $argv[1];
$password = $argv[2];

$hash = password_hash($password, PASSWORD_ARGON2ID);

$query = 'INSERT INTO users (email, password) VALUES (?,?);';
$statement = $pdo->prepare($query);
$statement->bindValue(1, $email);
$statement->bindValue(2, $hash);
$statement->execute();