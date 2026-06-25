<?php

require __DIR__ . '/../DAO/resenhaDAO.php';
require __DIR__ . '/../model/resenhaModel.php';
require_once __DIR__ . '/../model/leitorModel.php';
require_once __DIR__ . '/../model/livromodel.php';
require_once __DIR__ . '/../model/editoraModel.php';
require_once __DIR__ . '/../model/autorModel.php';


class ResenhaController {


    private resenhaDAO $dao;
    private leitorDAO $daoleitor;
    private LivroDAO $daolivro;



     public function __construct()
    {
        $this->dao = new resenhaDAO();
        $this->daoleitor = new leitorDAO();
        $this->daolivro = new LivroDAO();
      
    }


    public function editarresenha (int $id) {


    $resenha = $this->dao->buscarPorId($id);


    require __DIR__ . '/../view/editarresenha.php';

    }


    public function atualizarresenha(array $dados) {
    
    $this->dao->atualizarResenha($dados);


    }








  public function criarresenha(array $dados)
{
    $erros = [];

    $dadosLeitor = $this->daoleitor->buscarPorId($_SESSION['leitor']['idleitor']);
    $dadosLivro  = $this->daolivro->buscarLivroId($dados['idLivro']);

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

    $autor   = new Autor($dadosLivro['idautor'], $dadosLivro['nomeautor']);
    $editora = new Editora($dadosLivro['ideditora'], $dadosLivro['nomeeditora']);

    $livroObj = new Livro(
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

    $resenha = new Resenha(null, $dados['textoresenha'], date('Y-m-d'), $leitor, $livroObj);


    $livro    = $dadosLivro;
    $resenhas = $this->dao->exibirResenha($dadosLivro['idlivro']);



  $erros = $leitor->validar();

    if ($this->dao->resenhaExisteLeitor($dadosLivro['idlivro'], $dadosLeitor['idleitor'])) {
    $erros[] = "Você já possui uma resenha para este livro.";
}

    if (empty($erros)) {
    $this->dao->criarResenha($resenha);
    header('Location: index.php?acao=visualizarlivro&id=' . $dadosLivro['idlivro']);
    exit;
}

    require __DIR__ . "/../view/visualizarlivro.php";
}
 




    public function deletarresenha (int $id) {


    $this->dao->deletarresenha($id);

    header("Location: index.php?acao=visualizarperfil&id={$_SESSION['leitor']['idleitor']}");
    exit;



    }














  
}

    
?>


