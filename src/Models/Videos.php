<?php 

class Videos 
{
    private ?int $id;
    private string $url;
    private string $titulo; 

    public function __construct(?int $id, string $url, string $titulo){
        $this->id = $id;
        $this->setUrl($url);
        $this->setTitulo($titulo);
    }

    public function getId():int {
        return $this->id;
    } 

    public function getUrl():string {
        return $this->url;
    }

    public function setUrl($url):void{
        $url = trim($url);
        if(!filter_var($url, FILTER_VALIDATE_URL)){
            throw new InvalidArgumentException('URL inválida');
        } 
        $this->url = $url;
    }

    public function getTitulo():string {
        return $this->titulo;
    }

    public function setTitulo($titulo):void{
        $titulo = trim(strip_tags($titulo));
    
        if(strlen($titulo) < 3){
            throw new InvalidArgumentException('O titulo deve conter mais de 3 caracteres');
        }
        $this->titulo = $titulo;
    }
}