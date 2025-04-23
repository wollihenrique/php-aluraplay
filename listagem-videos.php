<?php

    require 'config.php';
    require 'src/Repository/RepositorioVideos.php';
    require 'src/Models/Videos.php';

    use Alura\Mvc\Repository\RepositorioVideos;
    use Alura\Mvc\Entity\Videos;

    $repositorioVideos = new RepositorioVideos($pdo);
    $videosList = $repositorioVideos->listaVideos();

?>
<?php require_once __DIR__ . '/public/inicio-html.php'; ?>
    <ul class="videos__container" alt="videos alura">
        <?php foreach($videosList as $video): ?>
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
        <?php endforeach;?>
    </ul>
</body>

</html>