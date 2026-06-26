<?php

require_once __DIR__ . '/../DAO/listaLeituraDAO.php';
require_once __DIR__ . '/../model/listaLeituraModel.php';

class listaLeituraController
{

    private ListaLeituraDAO $dao;

    public function __construct()
    {
        $this->dao = new ListaLeituraDAO();
    }


    public function adicionarLivro(array $dados)
    {
        if (!isset($_SESSION['leitor'])) {
            header('Location: index.php?acao=home');
            exit;
        }

        $statusValidos = ['quero_ler', 'lendo', 'lido'];
        $status = in_array($dados['status'] ?? '', $statusValidos)
            ? $dados['status']
            : 'quero_ler';

        $lista = new ListaLeitura(
            null,
            (int) $_SESSION['leitor']['idleitor'],
            (int) $dados['idLivro'],
            $status,
            date('Y-m-d')
        );

        $this->dao->adicionarLivro($lista);

        header('Location: index.php?acao=minhalista');
        exit;
    }


    public function removerLivro(int $idLista)
    {
        if (!isset($_SESSION['leitor'])) {
            header('Location: index.php?acao=home');
            exit;
        }

        // Garante que só o dono pode remover
        $item = $this->dao->buscarPorId($idLista);
        if ($item && (int)$item['idleitor'] === (int)$_SESSION['leitor']['idleitor']) {
            $this->dao->removerLivro($idLista);
        }

        header('Location: index.php?acao=minhalista');
        exit;
    }


    public function atualizarStatus(array $dados)
    {
        if (!isset($_SESSION['leitor'])) {
            header('Location: index.php?acao=home');
            exit;
        }

        $statusValidos = ['quero_ler', 'lendo', 'lido'];
        $status = in_array($dados['status'] ?? '', $statusValidos)
            ? $dados['status']
            : 'quero_ler';

        $this->dao->atualizarStatus((int) $dados['idLista'], $status);

        header('Location: index.php?acao=minhalista');
        exit;
    }


    public function minhaLista()
    {
        if (!isset($_SESSION['leitor'])) {
            header('Location: index.php?acao=home');
            exit;
        }

        $idLeitor = (int) $_SESSION['leitor']['idleitor'];
        $lista    = $this->dao->listarPorLeitor($idLeitor);

        require __DIR__ . '/../view/minhalista.php';
    }
}