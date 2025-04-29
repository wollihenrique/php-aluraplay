<?php

namespace Alura\Mvc\Controller;

class Error404Controller implements Controller
{
    public function processaRequisicao()
    {
        http_response_code(404);
    }
}