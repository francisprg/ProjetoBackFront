<?php

session_start();

define('APP_RUNNING', true);


require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/controller/resenhaController.php';
require __DIR__ . '/controller/leitorController.php';
require __DIR__ . '/controller/livroController.php';
require __DIR__ . '/controller/authController.php';
require __DIR__ . '/controller/avaliacaoController.php';

$resenhaController = new ResenhaController();
$leitorController = new leitorController();
$livroController = new livroController();
$authController = new authController();
$avaliacaoController = new avaliacaoController();




$acao = $_GET['acao'];


switch ($acao) {
    


    //REQUISICOES AUTENTICACAO

    case 'login':
        $authController->entrar($_POST);
    break;
        
    case 'home':

    require_once __DIR__ . '/DAO/livroDAO.php';
    $daoLivro = new livroDAO();
    $livros = $daoLivro->listarlivros();

    $livrosAvaliados = $daoLivro->listaMelhoresAvaliados();

    require __DIR__ . '/view/home.php';
     break;


    case 'logout':
        $authController->logout();
        break;
        


    //REQUISICOES RESENHA

    case 'criarresenha':
        $resenhaController->criarresenha($_POST);
        break;

    case 'deletarresenha';
        $resenhaController->deletarresenha($_GET['id']);
        break;

    case 'editarresenha';
        $resenhaController->editarresenha($_GET['id']);
        break;
    
    case 'atualizarresenha';
        $resenhaController->atualizarresenha($_POST);
        break;

    
    //REQUISICOES LEITOR

    case 'cadastrar';
        $leitorController->cadastrarLeitor($_POST);
        break;
        
    case 'deletarLeitor':
        $leitorController->deletarLeitor($_GET['id']);
    break;

    case 'editarLeitor':
        $leitorController->editarLeitor($_GET['id']);
        break;
    case 'atualizarLeitor':
        $leitorController->atualizarLeitor($_POST);
        break;
    case 'visualizarperfil':
        $leitorController->visualizarperfil($_GET['id']);
        break;



    // REQUISICOES GERAIS


     case 'buscarlivro';
        $livroController->buscarLivro($_POST);
        break;





     //REQUISICOES LIVRO;

    case 'visualizarcadlivro':
        $livroController->visualizarCadLivro();
        break;


    case 'cadastrarLivro':
        $livroController->cadastrarLivro($_POST);
        break;
        
    case 'listarlivros':
        $livroController->listarlivros();
        break;

    case 'listarlivrosjson':
    $livroController->listarlivrosJson();
    break;

    case 'deletarlivro':
        $livroController->deletarlivro($_GET['id']);
        break;

    case 'editarlivro':
    $livroController->editarLivro($_GET['id']);
    break;

    case 'atualizarlivro': 
        $livroController->atualizarLivro($_POST);
        break;
    ;

    case 'visualizarlivro':
        $livroController->visualizarLivro($_GET['id']);
        break;
    
    
    // REQUISICOES AVALIACAO 


    case 'avaliarlivro';
        $avaliacaoController->criarAvaliacao($_POST);
        break;


    default:
        require __DIR__ . '../view/login.php';
        break;
}