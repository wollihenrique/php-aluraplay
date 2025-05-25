<?php 

namespace Alura\Mvc\Controller;

use Alura\Mvc\Repository\VideoRepository;
use Alura\Mvc\Entity\Videos;

class AddVideoController implements Controller
{
    private VideoRepository $videoRepository;

    public function __construct(VideoRepository $videoRepository)
    {
        $this->videoRepository = $videoRepository;
    }

    public function processaRequisicao()
    {
        $url = filter_input(INPUT_POST, 'url', FILTER_VALIDATE_URL);
        if($url === false) {
            header('Location: /?sucesso=0');
            exit;
        }
        $titulo = filter_input(INPUT_POST, 'titulo');
        if($titulo === false) {
            header('Location: /?sucesso=0');
            exit;
        }

        $video = new Videos($url, $titulo);

        if($_FILES['image']['error'] === UPLOAD_ERR_OK){
            move_uploaded_file(
                $_FILES['image']['tmp_name'],
                __DIR__ . '/../../public/img/uploads/' . $_FILES['image']['name']);

            $video->setFilePath($_FILES['image']['name']);
        }

        if($this->videoRepository->criarVideo($video) === false){
            header('Location: /?sucesso=0');
        } else {
            header('Location: /?sucesso=1');
        }
    }
}