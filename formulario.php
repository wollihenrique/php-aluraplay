<?php

require 'config.php';
require 'src/Repository/RepositorioVideos.php';
require 'src/Models/Videos.php';

use Alura\Mvc\Repository\RepositorioVideos;
use Alura\Mvc\Entity\Videos;

$repositorioVideos = new RepositorioVideos($pdo);

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if($id !== false && $id !== null){
    $video = $repositorioVideos->lerVideo($id);
}
?>
<?php require_once __DIR__ . '/public/inicio-html.php'; ?>
    <main class="container">

        <form class="container__formulario" action="" method="POST">
            <h2 class="formulario__titulo">Envie um vídeo!</h2>
                <div class="formulario__campo">
                    <label class="campo__etiqueta" for="url">Link embed</label>
                    <input 
                        name="url" 
                        class="campo__escrita" required
                        placeholder="Por exemplo: https://www.youtube.com/embed/FAY1K2aUg5g" 
                        id='url' 
                        value="<?= isset($video) ? $video->url : ''; ?>"
                    />
                </div>

                <div class="formulario__campo">
                    <label class="campo__etiqueta" for="titulo">Titulo do vídeo</label>
                    <input 
                        name="titulo" 
                        class="campo__escrita" required 
                        placeholder="Neste campo, dê o nome do vídeo"
                        id='titulo'
                        value="<?= isset($video) ? $video->titulo : ''; ?>" 
                    />
                </div>

                <input class="formulario__botao" type="submit" value="Enviar" />
        </form>

    </main>

</body>

</html>