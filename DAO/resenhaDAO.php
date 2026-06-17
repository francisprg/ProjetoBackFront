<?php 


require_once __DIR__ . '/../config/Database.php';

Class resenhaDAO {

    
  



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

  public function exibirResenhaLeitor(int $id) {


     $sql = 'SELECT 
            r.idresenha,
            l.nomeleitor,
            r.textoresenha,
            r.dataresenha,
            lv.titulo,
            lv.capalivro
        FROM resenha r
        INNER JOIN leitor l
            ON r.idleitor = l.idleitor
        INNER JOIN livro lv
             ON r.idlivro = lv.idlivro
        WHERE r.idleitor = :id;';

    $stmt = $this->conexao->prepare($sql);

    $stmt->execute([
        ':id' => $id
    ]);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);

  }



    public function deletarResenha ($id) {

    $sql = 'DELETE FROM resenha WHERE idresenha = :id';

    $stmt = $this->conexao->prepare($sql);

    $stmt->execute([
        ':id' => $id
    ]);

    }


    public function atualizarResenha (array $dados) {

    $sql = 'UPDATE resenha
        SET textoresenha = :textoresenha
        WHERE idresenha = :idresenha';

    $stmt = $this->conexao->prepare($sql);

    $stmt->execute([
    ':textoresenha' => $dados['textoresenha'],
    ':idresenha' => $dados['idresenha']
    ]);

    }











    public function buscarPorId ($id) {


    $sql = 'SELECT * FROM resenha WHERE idresenha = :id';

    $stmt = $this->conexao->prepare($sql);

    $stmt->execute([':id' => $id]);


     return $stmt->fetch(PDO::FETCH_ASSOC);

    }
 
    







}


    



?>