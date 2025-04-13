<?php

require 'config.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$video = [
    'url' => '',
    'titulo' => '',
];

if($id !== false && $id !== null){
    $query = 'SELECT * FROM videos WHERE id = ?;';
    $statement = $pdo->prepare($query);
    $statement->bindValue(1, $id, PDO::PARAM_INT);
    $statement->execute();
    $video = $statement->fetch(PDO::FETCH_ASSOC);
}
?>
<?php require_once 'inicio-html.php'; ?>
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
                        value="<?= $video['url']; ?>"
                    />
                </div>


                <div class="formulario__campo">
                    <label class="campo__etiqueta" for="titulo">Titulo do vídeo</label>
                    <input 
                        name="titulo" 
                        class="campo__escrita" required 
                        placeholder="Neste campo, dê o nome do vídeo"
                        id='titulo'
                        value="<?=$video['titulo']; ?>" 
                    />
                </div>

                <input class="formulario__botao" type="submit" value="Enviar" />
        </form>

    </main>

</body>

</html>