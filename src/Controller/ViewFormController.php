<?php 

namespace Alura\Mvc\Controller;

use Alura\Mvc\Repository\VideoRepository;

class ViewFormController implements Controller
{
    private VideoRepository $videoRepository;

    public function __construct(VideoRepository $videoRepository)
    {
        $this->videoRepository = $videoRepository;
    }

    public function processaRequisicao()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $video = null;

        if($id !== false && $id !== null){
            $video = $this->videoRepository->lerVideo($id);
        }
        require __DIR__ . '/../../views/video-form.php';
    }
}