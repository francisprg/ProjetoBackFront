

<?php 


require __DIR__ . '/../DAO/authDAO.php';
require __DIR__ . '/../model/usuarioLoginModel.php';


class authController {



  private authDAO $dao;



    public function __construct()
    {
    $this->dao = new authDAO();
      
    }   



    public function entrar(array $dados) : VOID {

    
    


    $usuario = new UsuarioLogin($dados['email'] ?? '', $dados['senha'] ?? '');
    $erros = $usuario->validar();

    if($erros) {

    require __DIR__ . '/../view/login.php';
    return;


    }

    $pessoa = $this->dao->autenticar($usuario);


    if (!$pessoa) {
            $erros = ['E-mail ou senha inválidos.'];
            require __DIR__ . '/../view/login.php';
            return;
        }
    
    $_SESSION['leitor'] = [
    'fotoleitor' => $pessoa['fotoleitor'],
    'idleitor' => $pessoa['idleitor'],
    'nome' => $pessoa['nomeleitor'],
    'admin' => $pessoa['admin']
    ];

        $_SESSION['mensagem'] = 'Login realizado com sucesso.';
        header('Location: index.php?acao=home');
        exit;


    }

     public function logout() {

    $_SESSION = [];

    session_destroy();

    header('Location: index.php');

    exit;
    }   





    }































?>