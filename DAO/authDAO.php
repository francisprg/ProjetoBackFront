<?php 

require_once __DIR__ . '/../config/Database.php';


Class authDAO {
    

    private PDO $conexao;

    public function __construct()
    {
        $this->conexao = Database::conectar();
    }



    public function autenticar(UsuarioLogin $usuario ): ?array 
    {

    $sql = "SELECT * FROM Leitor WHERE emailleitor = :email ";
    $stmt = $this->conexao->prepare($sql);
    $stmt->execute(['email' => $usuario->getEmail()]);
    $pessoa = $stmt->fetch();

    if (!$pessoa) {
            return null;
        }

    $senhaInformada = $usuario->getSenha();
    $senhaSalva = (String) $pessoa['senhaleitor'];


     if (password_verify($senhaInformada, $senhaSalva) || hash_equals($senhaSalva, $senhaInformada)) {
            return $pessoa;
        }

     return null;



    }


   















}












?>