<?php

namespace Alura\Mvc\Controller;

class LoginFormController implements Controller
{
    public function processaRequisicao()
    {
        require __DIR__ . '/../../views/login.php';
    }
}