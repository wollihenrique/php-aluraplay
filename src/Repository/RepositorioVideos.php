<?php 

class RepositorioVideos 
{
    private PDO $pdo;

    public function __construct(PDO $pdo){
        $this->pdo = $pdo;
    }

    public function criarVideo(Videos $video):bool {
        $query = "INSERT INTO videos (url, titulo) VALUES (?, ?);";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(1, $video->getUrl());
        $statement->bindValue(2, $video->getTitulo());

        if ($statement->execute() === true){
            return true;
        } else {
            return false;
        } 
    }

    public function listaVideos():array {
        $query = "SELECT * FROM videos;";
        $statement = $this->pdo->prepare($query);
        $statement->execute();
        $videos = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $videos;
    }

    public function lerVideo(int $id):array {
        $query = "SELECT * FROM videos WHERE id = ?;";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(1, $id);
        $statement->execute();
        $video = $statement->fetch(PDO::FETCH_ASSOC);
        return $video;
    }

    public function atualizarVideo(Videos $video): bool{
        $query = "UPDATE videos SET url = :url, titulo = :titulo WHERE id = :id;";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(':url', $video->getUrl());
        $statement->bindValue(':titulo', $video->getTitulo());
        $statement->bindValue(':id', $video->getId());

        if ($statement->execute() === true){
            return true;
        } else {
            return false;
        } 
    }

    public function deletarVideo(int $id):bool {
        $query = "DELETE FROM videos WHERE id = ?;";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(1, $id);

        if ($statement->execute() === true){
            return true;
        } else {
            return false;
        } 
    }
}