<?php

require_once __DIR__ . '/leitorModel.php';
require_once __DIR__ . '/livroModel.php';

class Resenha
{
    private ?int $idResenha;
    private string $textoResenha;
    private string $dataResenha;

    private LeitorModel $leitor;
    private Livro $livro;


    public function __construct(
        ?int $idResenha,
        string $textoResenha,
        string $dataResenha,
        LeitorModel $leitor,
        Livro $livro
    ) {
        $this->idResenha = $idResenha;
        $this->textoResenha = $textoResenha;
        $this->dataResenha = $dataResenha;
        $this->leitor = $leitor;
        $this->livro = $livro;
    }


    // GETTERS

    public function getIdResenha(): ?int
    {
        return $this->idResenha;
    }

    public function getTextoResenha(): string
    {
        return $this->textoResenha;
    }

    public function getDataResenha(): string
    {
        return $this->dataResenha;
    }

    public function getLeitor(): LeitorModel
    {
        return $this->leitor;
    }

    public function getLivro(): Livro
    {
        return $this->livro;
    }


    // SETTERS

    public function setTextoResenha(string $textoResenha): void
    {
        $this->textoResenha = $textoResenha;
    }

    public function setDataResenha(string $dataResenha): void
    {
        $this->dataResenha = $dataResenha;
    }

    public function setLeitor(LeitorModel $leitor): void
    {
        $this->leitor = $leitor;
    }

    public function setLivro(Livro $livro): void
    {
        $this->livro = $livro;
    }



}