<?php

require_once __DIR__ . '/../model/comentarioModel.php';
 require_once __DIR__ . '/../config/Database.php';

class ComentarioDAO
{

    private PDO $conexao;

    public function __construct()
    {
        $this->conexao = Database::conectar();
    }


    public function criarComentario(Comentario $comentario): void
    {
        $sql = "INSERT INTO comentario (comentario, datacomentario, idleitor, idresenha)
                VALUES (:texto, :data, :idleitor, :idresenha)";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([
            ':texto'     => $comentario->getComentario(),
            ':data'      => $comentario->getDataComentario(),
            ':idleitor'  => $comentario->getLeitor()->getIdLeitor(),
            ':idresenha' => $comentario->getResenha()->getIdResenha(),
        ]);
    }

    public function listarPorResenha(int $idresenha): array
    {
      $sql = "SELECT c.idcomentario, c.comentario, c.datacomentario, c.idleitor,
               l.nomeleitor, l.apelidoleitor, l.fotoleitor
        FROM comentario c
        JOIN leitor l ON l.idleitor = c.idleitor
        WHERE c.idresenha = :idresenha
        ORDER BY c.datacomentario ASC";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([':idresenha' => $idresenha]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deletar (int $idcomentario) {

        $sql = "DELETE FROM comentario 
        where idcomentario = :idcomentario";

        $stmt = $this->conexao->prepare(($sql));

        $stmt->execute([
        ':idcomentario' => $idcomentario 
        ]);
    }



  public function editarcomentario(array $dados): array
{
    $sql = 'UPDATE comentario SET comentario = :comentario WHERE idcomentario = :idcomentario';

    $stmt = $this->conexao->prepare($sql);
    $stmt->execute([
        ':comentario'   => $dados['textoComentario'],
        ':idcomentario' => $dados['idcomentario']
    ]);

    return ['sucesso' => true];
}


}