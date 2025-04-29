<?php 

namespace Alura\Mvc\Controller;

use Alura\Mvc\Repository\VideoRepository;

class DeleteVideoController implements Controller
{
    private VideoRepository $videoRepository;

    public function __construct(VideoRepository $videoRepository)
    {
        $this->videoRepository = $videoRepository;
    }

    public function processaRequisicao()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if($id === false){
            header('Location: /?sucesso=0');
            exit;
        }

        if( $this->videoRepository->deletarVideo($id) === false) {
            header('Location: /?sucesso=1');
        } else {
            header('Location: /?sucesso=0');
        }
    }
}