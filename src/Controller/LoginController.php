<?php

namespace Alura\Mvc\Controller;

use PDO;

class LoginController implements Controller
{
    private PDO $pdo;

    public function __construct()
    {
        require __DIR__ . '/../../config.php';
        $this->pdo = $pdo;

    }

    public function processaRequisicao()
    {
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, 'senha');

        $query = 'SELECT * FROM users WHERE email = ?;';
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(1, $email);
        $statement->execute();

        $userData = $statement->fetch(PDO::FETCH_ASSOC);
        if(password_verify($password, $userData['password'])){
            $_SESSION['logado'] = true;
            header('Location: /');
        } else {
            header('Location: /login?sucesso=0');
        }
    }
}