<?php

class ListaLeitura
{

    private $idLista;
    private $idLeitor;
    private $idLivro;
    private $status;
    private $dataAdicionado;

    public function __construct(
        $idLista,
        $idLeitor,
        $idLivro,
        $status,
        $dataAdicionado
    ) {
        $this->idLista        = $idLista;
        $this->idLeitor       = $idLeitor;
        $this->idLivro        = $idLivro;
        $this->status         = $status;
        $this->dataAdicionado = $dataAdicionado;
    }

    public function getIdLista()
    {
        return $this->idLista;
    }

    public function setIdLista($idLista)
    {
        $this->idLista = $idLista;
    }

    public function getIdLeitor()
    {
        return $this->idLeitor;
    }

    public function setIdLeitor($idLeitor)
    {
        $this->idLeitor = $idLeitor;
    }

    public function getIdLivro()
    {
        return $this->idLivro;
    }

    public function setIdLivro($idLivro)
    {
        $this->idLivro = $idLivro;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function getDataAdicionado()
    {
        return $this->dataAdicionado;
    }

    public function setDataAdicionado($dataAdicionado)
    {
        $this->dataAdicionado = $dataAdicionado;
    }
}