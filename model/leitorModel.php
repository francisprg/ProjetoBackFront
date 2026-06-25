<?php

class LeitorModel
{
    private $idLeitor;
    private $nomeLeitor;
    private $sobrenomeLeitor;
    private $apelidoLeitor;
    private $emailLeitor;
    private $senhaLeitor;
    private $datanascLeitor;
    private $bioLeitor;
    private $fotoLeitor;

    
    public function __construct(
    string $nomeLeitor,
    string $sobrenomeLeitor,
    string $apelidoLeitor,
    string $emailLeitor,
    string $senhaLeitor,
    string $datanascLeitor,
    string $fotoLeitor,
    ?string $bioLeitor = '',
    ?int $idLeitor = null
) {
    $this->idLeitor = $idLeitor;
    $this->nomeLeitor = $nomeLeitor;
    $this->sobrenomeLeitor = $sobrenomeLeitor;
    $this->apelidoLeitor = $apelidoLeitor;
    $this->emailLeitor = $emailLeitor;
    $this->senhaLeitor = $senhaLeitor;
    $this->datanascLeitor = $datanascLeitor;
    $this->bioLeitor = $bioLeitor;
    $this->fotoLeitor = $fotoLeitor;
}

    // GETTERS

    public function getIdLeitor()
    {
        return $this->idLeitor;
    }

    public function getNomeLeitor()
    {
        return $this->nomeLeitor;
    }

    public function getSobrenomeLeitor()
    {
        return $this->sobrenomeLeitor;
    }

    public function getApelidoLeitor()
    {
        return $this->apelidoLeitor;
    }

    public function getEmailLeitor()
    {
        return $this->emailLeitor;
    }

    public function getSenhaLeitor()
    {
        return $this->senhaLeitor;
    }

    public function getDatanascLeitor()
    {
        return $this->datanascLeitor;
    }

    public function getBioLeitor()
    {
        return $this->bioLeitor;
    }

    public function getFotoLeitor()
    {
        return $this->fotoLeitor;
    }

    // SETTERS

    public function setIdLeitor($idLeitor)
    {
        $this->idLeitor = $idLeitor;
    }

    public function setNomeLeitor($nomeLeitor)
    {
        $this->nomeLeitor = $nomeLeitor;
    }

    public function setSobrenomeLeitor($sobrenomeLeitor)
    {
        $this->sobrenomeLeitor = $sobrenomeLeitor;
    }

    public function setApelidoLeitor($apelidoLeitor)
    {
        $this->apelidoLeitor = $apelidoLeitor;
    }

    public function setEmailLeitor($emailLeitor)
    {
        $this->emailLeitor = $emailLeitor;
    }

    public function setSenhaLeitor($senhaLeitor)
    {
        $this->senhaLeitor = $senhaLeitor;
    }

    public function setDatanascLeitor($datanascLeitor)
    {
        $this->datanascLeitor = $datanascLeitor;
    }

    public function setBioLeitor($bioLeitor)
    {
        $this->bioLeitor = $bioLeitor;
    }

    public function setFotoLeitor($fotoLeitor)
    {
        $this->fotoLeitor = $fotoLeitor;
    }


    public function validar () {

    $erros = [];

    if ($this->nomeLeitor == '') {
    $erros[] = 'Deve preencher o nome!';
}
     if ($this->sobrenomeLeitor == '') {
        $erros[] = 'Deve preencher o sobrenome!';
         }
         if (!filter_var($this->emailLeitor, FILTER_VALIDATE_EMAIL)) {
            $erros[] = 'Informe um e-mail válido.';
              }
            if ($this->senhaLeitor === '') {
         $erros[] = 'Informe a senha.';
            }




    return $erros;


    }










}