

<?php 

    require_once __DIR__ . '/livroModel.php';
    
    require_once __DIR__ . '/leitorModel.php';
    

    class Avaliacao
    {
    private ?int $idavaliacao;
    private int $qtdestrelas;

    private Livro $livro;
    private LeitorModel $leitor;


    public function __construct(
        ?int $idavaliacao,
        int $qtdestrelas,
        Livro $livro,
        LeitorModel $leitor
    ) {
        $this->idavaliacao = $idavaliacao;
        $this->qtdestrelas = $qtdestrelas;
        $this->livro = $livro;
        $this->leitor = $leitor;
    }


    public function getIdavaliacao(): ?int
    {
        return $this->idavaliacao;
    }

    public function setIdavaliacao(?int $idavaliacao): void
    {
        $this->idavaliacao = $idavaliacao;
    }

    public function getQtdestrelas(): int
    {
        return $this->qtdestrelas;
    }

    public function setQtdestrelas(int $qtdestrelas): void
    {
        $this->qtdestrelas = $qtdestrelas;
    }

    public function getLivro(): Livro
    {
        return $this->livro;
    }

    public function setLivro(Livro $livro): void
    {
        $this->livro = $livro;
    }

    public function getLeitor(): LeitorModel
    {
        return $this->leitor;
    }

    public function setLeitor(LeitorModel $leitor): void
    {
        $this->leitor = $leitor;
    }
}


















?>