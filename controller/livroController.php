<?php 

     require_once __DIR__ . '/../DAO/livroDAO.php';
     require_once __DIR__ . '/../DAO/autorDAO.php';
     require_once __DIR__ . '/../DAO/editoraDAO.php';
     require_once __DIR__ . '/../model/livroModel.php';
     require_once __DIR__ . '/../model/autorModel.php';
     require_once __DIR__ . '/../DAO/resenhaDAO.php';


     Class livroController {


     private LivroDAO $dao;
     private autorDAO $daoautor;
     private editoraDAO $daoeditora;
     private resenhaDAO $daoresenha;



     public function __construct()
    {
        $this->dao = new LivroDAO();
        $this->daoautor = new autorDAO();
        $this->daoeditora = new editoraDAO();
        $this->daoresenha = new resenhaDAO();
      
    }


    public function  visualizarCadLivro () {

    
    $autores = $this->daoautor->listarAutores();
    $editoras = $this->daoeditora->listarEditoras();

    require __DIR__ . '/../view/cadastrarlivro.php';



    }


    public function listarlivrosJson()
{
    $livros = $this->dao->listarlivros();

    header('Content-Type: application/json');

    echo json_encode($livros);
}



    public function cadastrarLivro(array $dados) {

    $fotoLivro = $this->processarUpload();

    $autor = new Autor(
        $dados['idAutor'],
        null
    );

    $editora = new Editora(
        $dados['idEditora'],
        null
    );

    $livro = new Livro(
        null,
        $dados['titulo'],
        $dados['isbn'],
        $dados['numeroPaginas'],
        $dados['ano'],
        $dados['idioma'],
        $fotoLivro,
        $autor,
        $editora
    );

    $this->dao->cadastrarLivro($livro);
}

public function listarlivros() {

    $livros = $this->dao->listarlivros();

    require __DIR__ . '/../view/listarlivro.php';
}







 
     public function processarUpload () {

   
     $nome_arquivo = $_FILES['fotoLivro']['name'];
    $arquivo_temporario = $_FILES['fotoLivro']['tmp_name'];

    $caminho = __DIR__ . "/../imagens/" . $nome_arquivo;

    if (move_uploaded_file($arquivo_temporario, $caminho)) {

        echo "Upload concluído com sucesso";

        return $nome_arquivo;
    } 
    else {

        echo "Arquivo não pode ser copiado para o servidor.";

        return false;
    }

    }



    public function deletarlivro (int $id) {


    $this->dao->deletarLivro($id);


   require __DIR__ . '/../view/listarlivro.php';


    }



    public function editarLivro (int $id) {


    $dadosLivro = $this->buscarLivroId($id);

    $autores = $this->daoautor->listarAutores();
    $editoras = $this->daoeditora->listarEditoras();

    require __DIR__ . '/../view/editarlivro.php';




    }


    public function atualizarLivro (array $dados) {



    if (!empty($_FILES['fotoLivro']['name'])) {

        $imagem = $this->processarUpload();

    } else {

        $imagem = $dados['fotoAntiga'];
    }
    
    $dados['fotoLivro'] = $imagem;

    $this->dao->atualizarLivro($dados);


    header('Location: ../index.php?acao=listarlivros');
    exit;





    }


    public function buscarLivroId (int $id) {


    $livro = $this->dao->buscarLivroid($id);


    return $livro;



    }



    public function visualizarLivro (int $id) {


    $livro = $this->dao->buscarLivroid($id);  
    $resenhas = $this->daoresenha->exibirResenha($id); 

    $ehDonoDoPerfil =
    isset($_SESSION['leitor']) &&
    $_SESSION['leitor']['idleitor'] == $id;


    require __DIR__ . '/../view/visualizarlivro.php';

    }



    public function buscarLivro (array $dados) {


    $livros = $this->dao->buscarLivro($dados['termo']);


    require __DIR__ . '/../view/visualizarBusca.php';


    }

    










     }











?>