<?php

require_once __DIR__ . '/../DAO/comentarioDAO.php';
require_once __DIR__ . '/../DAO/leitorDAO.php';
require_once __DIR__ . '/../DAO/resenhaDAO.php';
require_once __DIR__ . '/../model/comentarioModel.php';
require_once __DIR__ . '/../model/resenhaModel.php';
require_once __DIR__ . '/../model/leitorModel.php';

class ComentarioController
{
    private ComentarioDAO $dao;
    private leitorDAO $daoleitor;
    private resenhaDAO $daoresenha;
    private LivroDAO $daolivro;


    public function __construct()
    {
        $this->dao        = new ComentarioDAO();
        $this->daoleitor  = new leitorDAO();
        $this->daoresenha = new resenhaDAO();
        $this->daolivro   = new LivroDAO;
    }

    
    public function listar(int $idResenha): array
{
    if (!$idResenha) return [];

    $idLogado = $_SESSION['leitor']['idleitor'] ?? null;

    $comentarios = $this->dao->listarPorResenha($idResenha);

    foreach ($comentarios as &$c) {
        $c['dono'] = ($c['idleitor'] === $idLogado);
    }

    return $comentarios;
}


    public function criar(array $dados): array
    {
        if (!isset($_SESSION['leitor'])) {
            return ['erro' => 'Não autenticado'];
        }

        $idResenha = (int) ($dados['idResenha'] ?? 0);
        $texto     = trim($dados['textoComentario'] ?? '');

        if (!$idResenha || $texto === '') {
            return ['erro' => 'Dados inválidos'];
        }

        $dadosLeitor  = $this->daoleitor->buscarPorId($_SESSION['leitor']['idleitor']);
        $dadosResenha = $this->daoresenha->buscarPorId($idResenha);

        // Monta o leitor do comentário (quem está comentando)
        $leitor = new LeitorModel(
            $dadosLeitor['nomeleitor'],
            $dadosLeitor['sobrenomeleitor'],
            $dadosLeitor['apelidoleitor'],
            $dadosLeitor['emailleitor'],
            $dadosLeitor['senhaleitor'],
            $dadosLeitor['datanascleitor'],
            $dadosLeitor['fotoleitor'],
            $dadosLeitor['bioleitor'],
            $dadosLeitor['idleitor']
        );

        $dadosLeitorResenha = $this->daoleitor->buscarPorId($dadosResenha['idleitor']);
        $dadosLivro         = $this->daolivro->buscarLivroId($dadosResenha['idlivro']);

        $leitorResenha = new LeitorModel(
            $dadosLeitorResenha['nomeleitor'],
            $dadosLeitorResenha['sobrenomeleitor'],
            $dadosLeitorResenha['apelidoleitor'],
            $dadosLeitorResenha['emailleitor'],
            $dadosLeitorResenha['senhaleitor'],
            $dadosLeitorResenha['datanascleitor'],
            $dadosLeitorResenha['fotoleitor'],
            $dadosLeitorResenha['bioleitor'],
            $dadosLeitorResenha['idleitor']
        );

        $autor   = new Autor($dadosLivro['idautor'], $dadosLivro['nomeautor']);
        $editora = new Editora($dadosLivro['ideditora'], $dadosLivro['nomeeditora']);

        $livro = new Livro(
            $dadosLivro['idlivro'],
            $dadosLivro['titulo'],
            $dadosLivro['isbn'],
            $dadosLivro['numeropaginas'],
            $dadosLivro['ano'],
            $dadosLivro['idioma'],
            $dadosLivro['capalivro'],
            $autor,
            $editora
        );

        $resenha = new Resenha(
            $dadosResenha['idresenha'],
            $dadosResenha['textoresenha'],
            $dadosResenha['dataresenha'],
            $leitorResenha,
            $livro
        );

        $comentario = new Comentario($leitor, $resenha, $texto);
        $this->dao->criarComentario($comentario);

        return ['sucesso' => true];
    }




    public function deletar(array $dados) {

    $this->dao->deletar($dados['idcomentario']);

    return ['sucesso' => true];

    }

    public function editarcomentario(array $dados): array
{
    if (empty($dados['idcomentario']) || empty($dados['textoComentario'])) {
        return ['sucesso' => false, 'erro' => 'Dados inválidos.'];
    }

    return $this->dao->editarcomentario($dados);
}










}
