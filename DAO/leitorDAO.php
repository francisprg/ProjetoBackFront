<?php 

    require_once __DIR__ . '/../config/Database.php';
    require_once __DIR__ . '/../model/livroModel.php';

    Class leitorDAO {

  

    private PDO $conexao;

    public function __construct()
    {
        $this->conexao = Database::conectar();
    }





    public function listarleitores () {

    $sql = 'SELECT * FROM leitor ORDER BY idleitor DESC';

    $stmt = $this->conexao->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }





    public function deletarLeitor ($id) {

    $sql = "DELETE FROM Leitor WHERE idLeitor = :id";

    $stmt = $this->conexao->prepare($sql);

    $stmt->execute([':id' => $id]);

    }




    public function cadastrarLeitor (LeitorModel $leitor) {

    $sql = "INSERT INTO Leitor (
    nomeLeitor,
    sobrenomeLeitor,
    apelidoLeitor,
    emailLeitor,
    senhaLeitor,
    datanascLeitor,
    fotoLeitor
) VALUES (
    :nomeLeitor,
    :sobrenomeLeitor,
    :apelidoLeitor,
    :emailLeitor,
    :senhaLeitor,
    :datanascLeitor,
    :fotoLeitor
)";

    $stmt = $this->conexao->prepare($sql);

    $stmt->execute([
    ':nomeLeitor' => $leitor->getNomeLeitor(),
    ':sobrenomeLeitor' => $leitor->getSobrenomeLeitor(),
    ':apelidoLeitor' => $leitor->getApelidoLeitor(),
    ':emailLeitor' => $leitor->getEmailLeitor(),
    ':senhaLeitor' => password_hash(
        $leitor->getSenhaLeitor(),
        PASSWORD_DEFAULT
    ),
    ':datanascLeitor' => $leitor->getDatanascLeitor(),
    ':fotoLeitor' => $leitor->getFotoLeitor()
]);
    }


    public function buscarPorId ($id) {


    $sql = "SELECT * FROM Leitor WHERE idLeitor = :id";

    $stmt = $this->conexao->prepare($sql);

    $stmt->execute([':id' => $id]);

    return $stmt->fetch(PDO::FETCH_ASSOC);

    }



    public function atualizarLeitor (array $dados) {

    $sql = "UPDATE leitor SET
        nomeleitor = :nomeLeitor,
        sobrenomeleitor = :sobrenomeLeitor,
        apelidoleitor = :apelidoLeitor,
        emailleitor = :emailLeitor,
        senhaleitor = :senhaLeitor,
        datanascleitor = :datanascLeitor,
        bioleitor = :bioLeitor,
        fotoleitor = :fotoLeitor
    WHERE idleitor = :idLeitor";

    $stmt = $this->conexao->prepare($sql);

    $stmt->execute([
        ':idLeitor' => $dados['idLeitor'],
        ':nomeLeitor' => $dados['nomeLeitor'],
        ':sobrenomeLeitor' => $dados['sobrenomeLeitor'],
        ':apelidoLeitor' => $dados['apelidoLeitor'],
        ':emailLeitor' => $dados['emailLeitor'],
        ':senhaLeitor' => password_hash(
            $dados['senhaLeitor'],
            PASSWORD_DEFAULT
        ),
        ':datanascLeitor' => $dados['datanascLeitor'],
        ':bioLeitor' => $dados['bioLeitor'],
        ':fotoLeitor' => $dados['fotoLeitor']
    ]);

}

   


    }




?>