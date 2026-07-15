<?php

require_once __DIR__ . '/leitorModel.php';
require_once __DIR__ . '/resenhaModel.php';

class Comentario
{
    private int $idComentario;
    private string $dataComentario;
    private string $comentario;
    private LeitorModel $leitor;
    private Resenha $resenha;

    public function __construct(
        LeitorModel $leitor,
        Resenha $resenha,
        string $comentario,
        int $idComentario = 0
    ) {
        $this->idComentario   = $idComentario;
        $this->leitor         = $leitor;
        $this->resenha        = $resenha;
        $this->comentario     = $comentario;
        $this->dataComentario = date('Y-m-d H:i:s');
    }


    // GETTERS

    public function getIdComentario(): int
    {
        return $this->idComentario;
    }

    public function getComentario(): string
    {
        return $this->comentario;
    }

    public function getDataComentario(): string
    {
        return $this->dataComentario;
    }

    public function getLeitor(): LeitorModel
    {
        return $this->leitor;
    }

    public function getResenha(): Resenha
    {
        return $this->resenha;
    }


    // SETTERS

    public function setIdComentario(int $idComentario): void
    {
        $this->idComentario = $idComentario;
    }

    public function setComentario(string $comentario): void
    {
        $this->comentario = $comentario;
    }

    public function setLeitor(LeitorModel $leitor): void
    {
        $this->leitor = $leitor;
    }

    public function setResenha(Resenha $resenha): void
    {
        $this->resenha = $resenha;
    }
}