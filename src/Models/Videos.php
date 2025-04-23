<?php 

namespace Alura\Mvc\Entity;

class Videos 
{

    public readonly int $id;
    public readonly string $url;
    public readonly string $titulo;
    public function __construct(
        string $url, 
        string $titulo
        ) {
            $this->setUrl($url);
            $this->setTitulo($titulo);
    }

    public function setId(int $id){
        $this->id = $id;
    }

    public function setUrl($url):void{
        $url = trim($url);
        if(!filter_var($url, FILTER_VALIDATE_URL)){
            throw new \InvalidArgumentException('URL inválida');
        } 
        $this->url = $url;
    }

    public function setTitulo($titulo):void{
        $titulo = trim(strip_tags($titulo));
    
        if(strlen($titulo) < 3){
            throw new \InvalidArgumentException('O titulo deve conter mais de 3 caracteres');
        }
        $this->titulo = $titulo;
    }
}