<?php
header('Content-Type: application/json');

require_once __DIR__ . '/../controller/comentarioController.php';
require_once __DIR__ . '/../controller/resenhaController.php';
require_once __DIR__ . '/../controller/leitorController.php';
require_once __DIR__ . '/../controller/livroController.php';
require_once __DIR__ . '/../controller/authController.php';
require_once __DIR__ . '/../DAO/comentarioDAO.php';
require_once __DIR__ . '/../DAO/leitorDAO.php';
require_once __DIR__ . '/../DAO/resenhaDAO.php';
require_once __DIR__ . '/../DAO/livroDAO.php';      
require_once __DIR__ . '/../model/comentarioModel.php';
require_once __DIR__ . '/../model/resenhaModel.php';
require_once __DIR__ . '/../model/leitorModel.php';
require_once __DIR__ . '/../model/livroModel.php';    
require_once __DIR__ . '/../model/autorModel.php';    
require_once __DIR__ . '/../model/editoraModel.php';  

$resenhaController = new ResenhaController();
$leitorController = new leitorController();
$livroController = new livroController();
$authController = new authController();
$comentarioController = new ComentarioController();


function lerDados(): array
{
    $json  = file_get_contents('php://input');
    $dados = json_decode($json, true);
    return is_array($dados) ? $dados : [];
}

$acao = $_GET['acao'] ?? '';


switch ($acao) {

    case 'listarlivros':
        echo json_encode($livroController->listarlivrosJson());
        break;

    case 'listarcomentarios':
        $idresenha = (int) ($_GET['idresenha'] ?? 0);
        echo json_encode($comentarioController->listar($idresenha));
        break;

    case 'criarcomentario':
        $dados = lerDados();
        echo json_encode($comentarioController->criar($dados));
        break;

    case 'buscarLivro':
        $termo = $_GET['termoBusca'];
        echo json_encode($livroController->buscarLivroTermojson($termo));
        break;


    case 'deletarcomentario':
        $dados = lerDados();
        echo json_encode($comentarioController->deletar($dados));
        break;


    case 'editarcomentario':
        $dados = lerDados();
        echo json_encode($comentarioController->editarcomentario($dados));
        break;

    case 'buscarLivroFiltrado':
        $termo  = $_GET['termo']  ?? '';
        $filtro = $_GET['filtro'] ?? 'titulo';
        echo json_encode($livroController->buscarLivroFiltradoJson($termo, $filtro));
        break;
        
    case 'editarresenha':
        $dados = lerDados();
        echo json_encode($resenhaController->editarResenhaJson($dados));
        break;

    default:
        echo json_encode([]);
}