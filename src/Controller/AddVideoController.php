<?php 

namespace Alura\Mvc\Controller;

use Alura\Mvc\Repository\VideoRepository;
use Alura\Mvc\Entity\Videos;
use finfo;

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
            $safeFileName = uniqid('upload_') . '_' . basename($_FILES['image']['name']);
            $finfo = new finfo(FILEINFO_MIME_TYPE);
            $mimetype = $finfo->file($_FILES['image']['tmp_name']);

            if(str_starts_with($mimetype, 'image/')){
                move_uploaded_file(
                    $_FILES['image']['tmp_name'],
                    __DIR__ . '/../../public/img/uploads/' . $safeFileName);
            }

            $video->setFilePath($safeFileName);
        }

        if($this->videoRepository->criarVideo($video) === false){
            header('Location: /?sucesso=0');
        } else {
            header('Location: /?sucesso=1');
        }
    }
}