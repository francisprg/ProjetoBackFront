<?php 


Class avaliacaoDAO {

    private PDO $conexao;

    public function __construct()
    {
        $this->conexao = Database::conectar();
    }


   public function criarAvaliacao(Avaliacao $avaliacao)
{
    $sql = 'INSERT INTO Avaliacao (
                qntestrelas,
                idlivro,
                idleitor
            )
            VALUES (
                :qntestrelas,
                :idlivro,
                :idleitor
            )';

    $stmt = $this->conexao->prepare($sql);

    $stmt->execute([
        ':qntestrelas' => $avaliacao->getQtdestrelas(),
        ':idlivro' => $avaliacao->getLivro()->getIdLivro(),
        ':idleitor' => $avaliacao->getLeitor()->getIdLeitor()
    ]);
}

    }


























?>