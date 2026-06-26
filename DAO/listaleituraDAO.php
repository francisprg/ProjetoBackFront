<?php

require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../model/Listaleituramodel.php';

class ListaLeituraDAO
{

    private PDO $conexao;

    public function __construct()
    {
        $this->conexao = Database::conectar();
    }


    public function adicionarLivro(ListaLeitura $lista)
    {
        // Evita duplicatas: se já existe, atualiza o status
        if ($this->livroNaLista($lista->getIdLivro(), $lista->getIdLeitor())) {
            $sql = 'UPDATE ListaLeitura
                    SET status = :status
                    WHERE idlivro  = :idlivro
                      AND idleitor = :idleitor';

            $stmt = $this->conexao->prepare($sql);
            $stmt->execute([
                ':status'   => $lista->getStatus(),
                ':idlivro'  => $lista->getIdLivro(),
                ':idleitor' => $lista->getIdLeitor(),
            ]);
            return;
        }

        $sql = 'INSERT INTO ListaLeitura (idLeitor, idLivro, status, dataAdicionado)
                VALUES (:idleitor, :idlivro, :status, :dataadicionado)';

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([
            ':idleitor'       => $lista->getIdLeitor(),
            ':idlivro'        => $lista->getIdLivro(),
            ':status'         => $lista->getStatus(),
            ':dataadicionado' => $lista->getDataAdicionado(),
        ]);
    }


    public function removerLivro(int $idLista)
    {
        $sql = 'DELETE FROM ListaLeitura WHERE idlista = :id';

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([':id' => $idLista]);
    }


    public function atualizarStatus(int $idLista, string $status)
    {
        $sql = 'UPDATE ListaLeitura SET status = :status WHERE idlista = :id';

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([
            ':status' => $status,
            ':id'     => $idLista,
        ]);
    }


    public function listarPorLeitor(int $idLeitor)
    {
        $sql = 'SELECT
                    ll.idlista,
                    ll.status,
                    ll.dataadicionado,
                    l.idlivro,
                    l.titulo,
                    l.capalivro,
                    l.numeropaginas,
                    a.nomeautor
                FROM ListaLeitura ll
                INNER JOIN Livro   l ON ll.idlivro  = l.idlivro
                INNER JOIN Autor   a ON l.idautor   = a.idautor
                WHERE ll.idleitor = :idleitor
                ORDER BY ll.dataadicionado DESC';

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([':idleitor' => $idLeitor]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function livroNaLista(int $idLivro, int $idLeitor): bool
    {
        $sql = 'SELECT COUNT(*) FROM ListaLeitura
                WHERE idlivro = :idlivro AND idleitor = :idleitor';

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([
            ':idlivro'  => $idLivro,
            ':idleitor' => $idLeitor,
        ]);

        return $stmt->fetchColumn() > 0;
    }


    public function buscarPorId(int $idLista)
    {
        $sql = 'SELECT * FROM ListaLeitura WHERE idlista = :id';

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([':id' => $idLista]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}