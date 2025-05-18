<?php

namespace Alura\Mvc\Controller;

class LogoutController implements Controller
{
    public function processaRequisicao()
    {
        session_destroy();
        header('Location: /login');
    }
}