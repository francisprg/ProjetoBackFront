<?php


require_once __DIR__ . '/../config/Database.php';

class resenhaDAO
{






    private PDO $conexao;

    public function __construct()
    {
        $this->conexao = Database::conectar();
    }


    public function criarResenha(Resenha $resenha)
    {
        $sql = 'INSERT INTO Resenha (
                textoResenha,
                dataResenha,
                idLeitor,
                idLivro
            )
            VALUES (
                :textoResenha,
                :dataResenha,
                :idLeitor,
                :idLivro
            )';

        $stmt = $this->conexao->prepare($sql);

        $stmt->execute([
            ':textoResenha' => $resenha->getTextoResenha(),
            ':dataResenha' => $resenha->getDataResenha(),

            ':idLeitor' => $resenha
                ->getLeitor()
                ->getIdLeitor(),

            ':idLivro' => $resenha
                ->getLivro()
                ->getIdLivro()
        ]);
    }


    public function exibirResenha(int $id)
    {
        $sql = 'SELECT
                leitor.fotoleitor,
                leitor.idleitor,
                leitor.nomeleitor,
                r.textoresenha,
                r.dataresenha
            FROM resenha r
            INNER JOIN leitor
                ON r.idleitor = leitor.idleitor
            WHERE r.idlivro = :id';

        $stmt = $this->conexao->prepare($sql);

        $stmt->execute([
            ':id' => $id
        ]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }



    public function deletarResenha($id)
    {

        $sql = 'DELETE FROM resenha WHERE idresenha = :id';

        $stmt = $this->conexao->prepare($sql);

        $stmt->execute([
            ':id' => $id
        ]);
    }


    public function atualizarResenha(array $dados)
    {

        $sql = 'UPDATE resenha
        SET textoresenha = :textoresenha
        WHERE idresenha = :idresenha';

        $stmt = $this->conexao->prepare($sql);

        $stmt->execute([
            ':textoresenha' => $dados['textoresenha'],
            ':idresenha' => $dados['idresenha']
        ]);
    }


    public function buscarPorId($id)
    {


        $sql = 'SELECT * FROM resenha WHERE idresenha = :id';

        $stmt = $this->conexao->prepare($sql);

        $stmt->execute([':id' => $id]);


        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    public function exibirResenhaLeitor(int $idLeitor)
{
    $sql = 'SELECT
                r.idresenha,
                r.textoresenha,
                r.dataresenha,
                l.titulo,
                l.capalivro
            FROM resenha r
            INNER JOIN livro l
                ON r.idlivro = l.idlivro
            WHERE r.idleitor = :idleitor
            ORDER BY r.dataresenha DESC';

    $stmt = $this->conexao->prepare($sql);

    $stmt->execute([
        ':idleitor' => $idLeitor
    ]);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}






    public function resenhaExisteLeitor(int $idLivro, int $idLeitor)
    {
        $sql = "SELECT COUNT(*) FROM resenha 
            WHERE idlivro = :idlivro AND idleitor = :idleitor";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([
            ':idlivro' => $idLivro,
            ':idleitor' => $idLeitor
        ]);

        return $stmt->fetchColumn() > 0;
    }
}
