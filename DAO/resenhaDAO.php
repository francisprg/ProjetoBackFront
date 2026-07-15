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
                r.idresenha,
                r.textoresenha,
                r.dataresenha,
                COUNT(c.idcomentario) AS total_comentarios  
            FROM resenha r
            INNER JOIN leitor
                ON r.idleitor = leitor.idleitor
            LEFT JOIN comentario c
                ON c.idresenha = r.idresenha
            WHERE r.idlivro = :id
            GROUP BY
                leitor.fotoleitor,
                leitor.idleitor,
                leitor.nomeleitor,
                r.idresenha,
                r.textoresenha,
                r.dataresenha
            ORDER BY r.dataresenha DESC';

    $stmt = $this->conexao->prepare($sql);
    $stmt->execute([':id' => $id]);
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


    // Atualiza somente o texto de uma resenha existente, identificada pelo idresenha.
    // Usada tanto pela rota antiga (form) quanto pelo modal (via ResenhaController::editarResenhaJson).
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
    l.idlivro,
    l.titulo,
    l.capalivro,
    av.idavaliacao,
    av.qntestrelas,
    COUNT(c.idcomentario) AS total_comentarios
FROM resenha r
INNER JOIN livro l ON r.idlivro = l.idlivro
LEFT JOIN comentario c ON c.idresenha = r.idresenha
LEFT JOIN avaliacao av ON av.idlivro = r.idlivro AND av.idleitor = r.idleitor
WHERE r.idleitor = :idleitor
GROUP BY
    r.idresenha, r.textoresenha, r.dataresenha,
    l.idlivro, l.titulo, l.capalivro,
    av.idavaliacao, av.qntestrelas
ORDER BY r.dataresenha DESC';

    $stmt = $this->conexao->prepare($sql);

    $stmt->execute([
        ':idleitor' => $idLeitor
    ]);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


    public function buscarLivroFiltrado(string $termo, string $filtro): array
    {
        $coluna = match ($filtro) {
            'editora' => 'e.nomeeditora',
            default   => 'a.nomeautor',
        };

        $sql = "SELECT l.idlivro, l.titulo, l.capalivro
            FROM livro l
            JOIN autor a ON l.idautor = a.idautor
            JOIN editora e ON l.ideditora = e.ideditora
            WHERE $coluna LIKE :termo";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([':termo' => '%' . $termo . '%']);
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