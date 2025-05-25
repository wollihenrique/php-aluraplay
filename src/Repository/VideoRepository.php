<?php 

namespace Alura\Mvc\Repository;

use Pdo;
use Alura\Mvc\Entity\Videos;

class VideoRepository
{
    private PDO $pdo;

    public function __construct(PDO $pdo){
        $this->pdo = $pdo;
    }

    public function hidratarVideo(array $videoData):Videos
    {
        $video = new Videos($videoData['url'], $videoData['titulo']);
        $video->setId($videoData['id']);

        if($videoData['image_path'] !== null){
            $video->setFilePath($videoData['image_path']);
        }

        return $video;
    }

    public function criarVideo(Videos $video):bool {
        $query = "INSERT INTO videos (url, titulo, image_path) VALUES (?, ?, ?);";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(1, $video->url);
        $statement->bindValue(2, $video->titulo);
        $statement->bindValue(3, $video->getFilePath());
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
        
            return array_map(
                $this->hidratarVideo(...),
                $videoList
            );
    }

    public function lerVideo(int $id):Videos {
        $query = "SELECT * FROM videos WHERE id = ?;";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(1, $id);
        $statement->execute();
        $video = $this->hidratarVideo($statement->fetch(PDO::FETCH_ASSOC));

        return $video;
    }

    public function atualizarVideo(Videos $video): bool{
        $updateImage = '';
        if($video->getFilePath() !== null){
            $updateImage = ', image_path = :image';
        }

        $query = "UPDATE videos SET url = :url, titulo = :titulo $updateImage WHERE id = :id;";
        $statement = $this->pdo->prepare($query);

        $statement->bindValue(':url', $video->url);
        $statement->bindValue(':titulo', $video->titulo);
        $statement->bindValue(':id', $video->id, PDO::PARAM_INT);

        if($video->getFilePath() !== null){
            $statement->bindValue(':image', $video->getFilePath());
        }

        return $statement->execute();
    }

    public function deletarVideo(int $id):bool {
        $query = "DELETE FROM videos WHERE id = ?;";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(1, $id);
        return $statement->execute();
    }

    public function removerCapa(Videos $video):bool {
        if($video->getFilePath() !== null){
            $query = "UPDATE videos SET image_path = NULL WHERE id = ?";
            $statement = $this->pdo->prepare($query);
            $statement->bindValue(1, $video->id, PDO::PARAM_INT);
            return $statement->execute();
        } else {
            return false;
        }    
    }
}