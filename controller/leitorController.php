<?php 

    require_once __DIR__ . '/../model/leitorModel.php';
    require_once __DIR__ . '/../DAO/leitorDAO.php';
    require_once __DIR__ . '/../DAO/resenhaDAO.php';



    Class leitorController {

    
    private leitorDAO $dao;
    private resenhaDAO $daoresenha;


    
     public function __construct()
    {
        $this->dao = new leitorDAO();
        $this->daoresenha = new resenhaDAO();
        
      
    }





    public function processarUpload () {

   
     $nome_arquivo = $_FILES['fotoLeitor']['name'];
    $arquivo_temporario = $_FILES['fotoLeitor']['tmp_name'];


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




   public function cadastrarLeitor(array $dados) {

    $imagem = $this->processarUpload();

    $leitor = new LeitorModel(
        $dados['nomeLeitor'],
        $dados['sobrenomeLeitor'],
        $dados['apelidoLeitor'],
        $dados['emailLeitor'],
        $dados['senhaLeitor'],
        $dados['datanascLeitor'],
        $imagem
    );

    $erros = $leitor->validar();

    if (empty($erros)) {
        $this->dao->cadastrarLeitor($leitor);
        header('Location: view/login.php');
        exit;
    }

    require __DIR__ . '/../view/login.php';
}



    public function deletarLeitor (int $id) {

    $this->dao->deletarLeitor($id);

    }  



    public function editarLeitor (int $id) {

    $dadosLeitor =  $this->dao->buscarPorId($id);


    require __DIR__ . '/../view/editarleitor.php';
    

    }


 

    public function atualizarLeitor(array $dados) {

    if (!empty($_FILES['fotoLeitor']['name'])) {

        $imagem = $this->processarUpload();

    } else {

        $imagem = $dados['fotoAntiga'];
    }
    
    $dados['fotoLeitor'] = $imagem;

    $this->dao->atualizarLeitor($dados);

    header('Location: index.php?acao=home');
    exit;
}

    public function visualizarperfil (int $id) {


    $leitor = $this->dao->buscarPorId($id);

    $resenhas = $this->daoresenha->exibirResenhaLeitor($id);

    $ehDonoDoPerfil =
    isset($_SESSION['leitor']) &&
    $_SESSION['leitor']['idleitor'] == $id;


    require __DIR__ . '/../view/perfilleitor.php';




    }










    }
    




?>