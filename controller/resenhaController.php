<?php

require_once __DIR__ . '/../DAO/resenhaDAO.php';
require_once __DIR__ . '/../model/resenhaModel.php';
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


       public function editarResenhaJson(array $dados): array
    {
        //verifica se os campos estao preenchidos
        if (empty($dados['idResenha']) || empty(trim($dados['textoResenha'] ?? ''))) {
            return ['sucesso' => false, 'erro' => 'Dados inválidos.'];
        }

        $idResenha = (int) $dados['idResenha'];
        $texto     = trim($dados['textoResenha']);

        //verifica se a resenha tem menos de 10 caracteres
        if (mb_strlen($texto) < 10) {
            return ['sucesso' => false, 'erro' => 'A resenha deve ter pelo menos 10 caracteres.'];
        }

        // Busca a resenha no banco dea dados
        $resenhaAtual = $this->dao->buscarPorId($idResenha);

        if (!$resenhaAtual) {
            return ['sucesso' => false, 'erro' => 'Resenha não encontrada.'];
        }

        // 3) Só o autor da resenha (leitor logado) pode editá-la.
        $idLeitorLogado = $_SESSION['leitor']['idleitor'] ?? null;

        //Verifica se o autor que quer editar a resenha é o que esta logado
        if ($idLeitorLogado === null || (int) $resenhaAtual['idleitor'] !== (int) $idLeitorLogado) {
            return ['sucesso' => false, 'erro' => 'Você não tem permissão para editar esta resenha.'];
        }
        
        // Faz a atualizacao da resenha
        $this->dao->atualizarResenha([
            'idresenha'    => $idResenha,
            'textoresenha' => $texto,
        ]);

        return ['sucesso' => true];
    }


    public function atualizarresenha(array $dados) {
    
    return  $this->dao->atualizarResenha($dados);

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

    $resenha = new Resenha(
        null, 
        $dados['textoresenha'],
         date('Y-m-d'), 
         $leitor, 
         $livroObj);


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


