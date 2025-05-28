<?php

namespace Alura\Mvc\Controller;

use Alura\Mvc\Controller\Controller;
use PDO;

class Cria_usuario implements Controller
{
    private PDO $pdo;

    public function __construct(PDO $pdo){
        $this->pdo = $pdo;
    }
    public function processaRequisicao()
    {
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $senha = filter_input(INPUT_POST, 'senha');

        $query = 'SELECT * FROM users WHERE id = ?';
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(1, $email);
        
        $userData = $statement->fetch(PDO::FETCH_ASSOC);
        $correctPassword = password_verify($senha, $userData['password'] ?? '');

        if($correctPassword){
            if(password_needs_rehash($userData['password'], PASSWORD_ARGON2ID)){
                $query = 'UPDATE users SET password = ? WHERE id = ?;';
                $statement = $this->pdo->prepare($query);
                $statement->bindValue(1, password_hash($senha, PASSWORD_ARGON2ID));
                $statement->bindValue(2, $userData['id']);
                $statement->execute();
            }

            header('Location: /?sucesso=1');
            exit();
        } else {
            header('Location: /?sucesso=0');
            exit();
        }
    }
}