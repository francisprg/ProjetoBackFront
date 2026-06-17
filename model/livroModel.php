<?php

require_once __DIR__ . '/autorModel.php';
require_once __DIR__ . '/editoraModel.php';

class Livro {

    private $idLivro;
    private $titulo;
    private $isbn;
    private $numeroPaginas;
    private $ano;
    private $idioma;
    private $fotoLivro;

    private Autor $autor;
    private Editora $editora;
    
    public function __construct(
    $idLivro,
    $titulo,
    $isbn,
    $numeroPaginas,
    $ano,
    $idioma,
    $fotoLivro,
    Autor $autor,
    Editora $editora
) {
    $this->idLivro = $idLivro;
    $this->titulo = $titulo;
    $this->isbn = $isbn;
    $this->numeroPaginas = $numeroPaginas;
    $this->ano = $ano;
    $this->idioma = $idioma;
    $this->fotoLivro = $fotoLivro;
    $this->autor = $autor;
    $this->editora = $editora;
}

    public function getIdLivro() {
    return $this->idLivro;
}

public function setIdLivro($idLivro) {
    $this->idLivro = $idLivro;
}

public function getTitulo() {
    return $this->titulo;
}

public function setTitulo($titulo) {
    $this->titulo = $titulo;
}

public function getIsbn() {
    return $this->isbn;
}

public function setIsbn($isbn) {
    $this->isbn = $isbn;
}

public function getNumeroPaginas() {
    return $this->numeroPaginas;
}

public function setNumeroPaginas($numeroPaginas) {
    $this->numeroPaginas = $numeroPaginas;
}

public function getAno() {
    return $this->ano;
}

public function setAno($ano) {
    $this->ano = $ano;
}

public function getIdioma() {
    return $this->idioma;
}

public function setIdioma($idioma) {
    $this->idioma = $idioma;
}

public function getFotoLivro() {
    return $this->fotoLivro;
}

public function setFotoLivro($fotoLivro) {
    $this->fotoLivro = $fotoLivro;
}

public function getAutor() {
    return $this->autor;
}

public function setAutor(Autor $autor) {
    $this->autor = $autor;
}

public function getEditora() {
    return $this->editora;
}

public function setEditora(Editora $editora) {
    $this->editora = $editora;
}
}