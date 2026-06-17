<?php 

    require_once __DIR__ . '/../DAO/avaliacaoDAO.php';
    require_once __DIR__ . '/../DAO/leitorDAO.php';
    require_once __DIR__ . '/../model/avaliacaoModel.php';

    class avaliacaoController {


    private avaliacaoDAO $dao;
    private leitorDAO $daoleitor;
    private LivroDAO $daolivro;

    public function __construct()
    {
        $this->dao = new avaliacaoDAO();
        $this->daoleitor = new leitorDAO();
        $this->daolivro = new LivroDAO;
      
    }   



    public function criarAvaliacao (array $dados) {


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


    $avaliacao = new Avaliacao(null, $dados['qtdestrelas'], $livro, $leitor);



    $this->dao->criarAvaliacao($avaliacao);

    
    


    }
















    }




















?>