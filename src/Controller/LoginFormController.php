<?php

namespace Alura\Mvc\Controller;

class LoginFormController implements Controller
{
    public function processaRequisicao()
    {
        if(array_key_exists('logado', $_SESSION) && $_SESSION['logado'] === true){
            header('Location: /');
        }
        require __DIR__ . '/../../views/login.php';
    }
}