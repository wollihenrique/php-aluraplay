<?php 

namespace Alura\Mvc\Repository;

use Pdo;
use Alura\Mvc\Entity\Videos;

class RepositorioVideos 
{
    private PDO $pdo;

    public function __construct(PDO $pdo){
        $this->pdo = $pdo;
    }

    public function criarVideo(Videos $video):bool {
        $query = "INSERT INTO videos (url, titulo) VALUES (?, ?);";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(1, $video->url);
        $statement->bindValue(2, $video->titulo);
        $result = $statement->execute();

        if($result === false) {
            throw new \InvalidArgumentException("Algo de errado não deu certo");
        } else {
            $id = $this->pdo->lastInsertId();
            $video->setId(intval($id));
            return $result;
        }

    }

    /**
     * Summary of listaVideos
     * @return Videos[]
     */
    public function listaVideos():array {
        $videoList = $this->pdo
            ->query('SELECT * FROM videos;')
            ->fetchAll(PDO::FETCH_ASSOC);
        
            return array_map(function(array $videoData){
                $video = new Videos($videoData['url'], $videoData['titulo']);
                $video->setId($videoData['id']);

                return $video;
            }, $videoList
        );
    }

    public function lerVideo(int $id):Videos {
        $query = "SELECT * FROM videos WHERE id = ?;";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(1, $id);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        $video = new Videos($result['url'], $result['titulo']);
        $video->setId($result['id']);
        return $video;
    }

    public function atualizarVideo(Videos $video): bool{
        $query = "UPDATE videos SET url = :url, titulo = :titulo WHERE id = :id;";
        $statement = $this->pdo->prepare($query);

        $statement->bindValue(':url', $video->url);
        $statement->bindValue(':titulo', $video->titulo);
        $statement->bindValue(':id', $video->id, PDO::PARAM_INT);

        return $statement->execute();
    }

    public function deletarVideo(int $id):bool {
        $query = "DELETE FROM videos WHERE id = ?;";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(1, $id);
        return $statement->execute();
    }
}