<?php 


Class Editora {

    
    private int $idEditora;
    private ?String $nomeEditora;

    public function __construct(int $idEditora,?string $nomeEditora = null) 
    {
        $this->idEditora = $idEditora;
        $this->nomeEditora = $nomeEditora;
    }

    public function getIdEditora() {
        return $this->idEditora;
    }

    public function setIdEditora(int $idEditora) {
        $this->idEditora = $idEditora;
    }


}





?>