<?php

namespace Alura\Mvc\Controller;

use Alura\Mvc\Repository\VideoRepository;

class VideoListController implements Controller
{
    private VideoRepository $videoRepository;

    public function __construct($videoRepository)
    {
        $this->videoRepository = $videoRepository;
    }

    public function processaRequisicao()
    {
        $videoList = $this->videoRepository->listaVideos();
        require_once __DIR__ . '/../../views/video-list.php';
    }

}