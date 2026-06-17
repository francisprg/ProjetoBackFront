

 <?php 
 
    require_once __DIR__ . '/../config/Database.php';

    Class autorDAO {

    

    private PDO $conexao;

    public function __construct()
    {
        $this->conexao = Database::conectar();
    }

    
    public function listarAutores() {

    $sql = "SELECT * FROM autor";

    $stmt = $this->conexao->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
    




    }
 
 
 
 
 
 
 
 
 ?>