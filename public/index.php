<?php

 //var_dump($_SERVER['PATH_INFO'], $_SERVER['REQUEST_METHOD']);
 //exit;

if(!array_key_exists('PATH_INFO', $_SERVER) || $_SERVER['PATH_INFO'] === '/') {
    require_once __DIR__ . '/../listagem-videos.php';
} elseif($_SERVER['PATH_INFO'] === '/inserir-videos') {
    if($_SERVER['REQUEST_METHOD'] === 'GET') {
        require_once __DIR__ . '/../formulario.php';
    } elseif($_SERVER['REQUEST_METHOD'] === 'POST') {
        require_once __DIR__ . '/../inserir-videos.php';
    }
} elseif($_SERVER['PATH_INFO'] === '/editar-videos') {
    if($_SERVER['REQUEST_METHOD'] === 'GET') {
        require_once __DIR__ . '/../formulario.php';
    } elseif($_SERVER['REQUEST_METHOD'] === 'POST') {
        require_once __DIR__ . '/../editar-videos.php';
    }
} elseif($_SERVER['PATH_INFO'] === '/excluir-videos') {
    require_once __DIR__ . '/../excluir-videos.php';
} else {
    http_response_code(404);
}