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
    // LEITOR
    $dadosLeitor = $this->daoleitor->buscarPorId(
        $_SESSION['leitor']['idleitor']
    );

    $leitor = new LeitorModel(
    $dadosLeitor['nomeleitor'],
    $dadosLeitor['sobrenomeleitor'],
    $dadosLeitor['apelidoleitor'],
    $dadosLeitor['emailleitor'],
    $dadosLeitor['senhaleitor'],
    $dadosLeitor['datanascleitor'],
    $dadosLeitor['bioleitor'],
    $dadosLeitor['fotoleitor'],
    $dadosLeitor['idleitor']
    );

    $dadosLivro = $this->daolivro->buscarLivroId(
        $dados['idLivro']
    );

    $autor = new Autor(
        $dadosLivro['idautor'],
        $dadosLivro['nomeautor']
    );


   
    $editora = new Editora(
        $dadosLivro['ideditora'],
        $dadosLivro['nomeeditora']
    );


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

    // RESENHA
    $resenha = new Resenha(
        null,
        $dados['textoresenha'],
        date('Y-m-d'),
        $leitor,
        $livro
    );


    $this->dao->criarResenha($resenha);
}

 
    public function deletarresenha (int $id) {


    $this->dao->deletarresenha($id);

  header("Location: index.php?acao=visualizarperfil&id={$_SESSION['leitor']['idleitor']}");
    exit;



    }














  
}

    
?>


