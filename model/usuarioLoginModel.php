<?php 



class UsuarioLogin
{
    private string $email;
    private string $senha;


    public function __construct(
        string $email,
        string $senha
    ) {
        $this->email = $email;
        $this->senha = $senha;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    
    public function getSenha(): string
    {
        return $this->senha;
    }

    public function setSenha(string $senha): void
    {
        $this->senha = $senha;
    }

    public function validar(): array
    {

    $erros = [];

    if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $erros[] = 'Informe um e-mail válido.';
        }

    if ($this->senha === '') {
        $erros[] = 'Informe a senha.';
        }



        return $erros;



    }
}

















?>