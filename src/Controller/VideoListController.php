<?php

namespace Alura\Mvc\Controller;

use Alura\Mvc\Repository\VideoRepository;

class VideoListController 
{
    private VideoRepository $videoRepository;

    public function __construct($videoRepository)
    {
        $this->videoRepository = $videoRepository;
    }

    public function processaRequisicao()
    {
        $videoList = $this->videoRepository->listaVideos();
        require_once __DIR__ . '/../../public/inicio-html.php'; 
            ?>
            <ul class="videos__container" alt="videos alura">
                <?php foreach($videoList as $video): ?>
                    <li class="videos__item">
                        <iframe width="100%" height="72%" src="<?= $video->url;?>"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                        <div class="descricao-video">
                            <img src="./img/logo.png" alt="logo canal alura">
                            <h3><?= $video->titulo;?></h3>
                            <div class="acoes-video">
                                <a href="editar-videos?id=<?php echo $video->id; ?>">Editar</a>
                                <a href="excluir-videos?id=<?php echo $video->id; ?>">Excluir</a>
                            </div>
                        </div>
                    </li>
                <?php endforeach; ?> 
            </ul>
        </body>

        </html>
        <?php
    }

}