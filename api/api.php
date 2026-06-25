<?php
require_once __DIR__ . "/../DAO/livroDAO.php";
require_once __DIR__ . "/../DAO/leitorDAO.php";

header('Content-Type: application/json');

function listarLivros() {
    $dao = new LivroDao();
    return $dao->listarLivros();
}


function listarleitores () {

    $dao = new leitorDAO();
    return $dao->listarleitores();

}

$acao = $_GET['acao'] ?? '';

switch ($acao) {


    case 'listarlivros':
        echo json_encode(listarLivros());
        break;
        
    case 'listarleitores':
    echo json_encode(listarleitores());
    break;


    default:
        echo json_encode([]);

}



