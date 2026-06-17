<?php

class Autor {

    private $idAutor;
    private $nomeAutor;

    public function __construct($idAutor, $nomeAutor) {
        $this->idAutor = $idAutor;
        $this->nomeAutor = $nomeAutor;
    }


    public function getIdAutor() {
        return $this->idAutor;
    }

    public function setIdAutor($idAutor) {
        $this->idAutor = $idAutor;
    }

    public function getNomeAutor() {
        return $this->nomeAutor;
    }

    public function setNomeAutor($nomeAutor) {
        $this->nomeAutor = $nomeAutor;
    }
}