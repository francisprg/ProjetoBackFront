<?php 


    Class editoraDAO {


     private PDO $conexao;

    public function __construct()
    {
        $this->conexao = Database::conectar();
    }


    public function listarEditoras () {

 
    $sql = "SELECT * FROM Editora";


    $stmt = $this->conexao->prepare($sql);
    $stmt->execute();


    return $stmt->fetchAll(PDO::FETCH_ASSOC);




    }














    }













?>