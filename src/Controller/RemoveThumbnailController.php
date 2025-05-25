<?php

namespace Alura\Mvc\Controller;

use Alura\Mvc\Controller\Controller;
use Alura\Mvc\Repository\VideoRepository;

class RemoveThumbnailController implements Controller
{
    private VideoRepository $videoRepository;

    public function __construct(videoRepository $videoRepository)
    {
        $this->videoRepository = $videoRepository;
    }
    public function processaRequisicao()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if($id === false || $id === null){
            header('Location: /?sucesso=0');
            exit;
        }

        $video = $this->videoRepository->lerVideo($id);
        
        if($this->videoRepository->removerCapa($video) === false){
            header('Location: /?sucesso=0');
        } else {
            header('Location: /?sucesso=1');
        }
    }
}