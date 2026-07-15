<?php



require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../model/livroModel.php';


class LivroDAO
{


    private PDO $conexao;

    public function __construct()
    {
        $this->conexao = Database::conectar();
    }


    public function cadastrarLivro(Livro $livro)
    {

        $sql = "INSERT INTO Livro (
        titulo,
        isbn,
        numeroPaginas,
        ano,
        idioma,
        capalivro,
        idAutor,
        idEditora
    ) VALUES (
        :titulo,
        :isbn,
        :numeroPaginas,
        :ano,
        :idioma,
        :fotoLivro,
        :idAutor,
        :idEditora
    )";

        $stmt = $this->conexao->prepare($sql);

        $stmt->execute([
            ':titulo' => $livro->getTitulo(),
            ':isbn' => $livro->getIsbn(),
            ':numeroPaginas' => $livro->getNumeroPaginas(),
            ':ano' => $livro->getAno(),
            ':idioma' => $livro->getIdioma(),
            ':fotoLivro' => $livro->getFotoLivro(),

            ':idAutor' => $livro
                ->getAutor()
                ->getIdAutor(),

            ':idEditora' => $livro
                ->getEditora()
                ->getIdEditora()
        ]);
    }


    public function deletarLivro($id)
    {


        $sql = "DELETE FROM livro WHERE idlivro = :id";

        $stmt = $this->conexao->prepare($sql);

        $stmt->execute([':id' => $id]);
    }


    public function atualizarLivro(array $dados)
    {
        $sql = 'UPDATE Livro
            SET titulo = :titulo,
                isbn = :isbn,
                numeroPaginas = :numeroPaginas,
                ano = :ano,
                idioma = :idioma,
                capalivro = :fotoLivro,
                idAutor = :idAutor,
                idEditora = :idEditora
            WHERE idLivro = :idLivro';

        $stmt = $this->conexao->prepare($sql);

        return $stmt->execute([
            ':titulo' => $dados['titulo'],
            ':isbn' => $dados['isbn'],
            ':numeroPaginas' => $dados['numeroPaginas'],
            ':ano' => $dados['ano'],
            ':idioma' => $dados['idioma'],
            ':fotoLivro' => $dados['fotoLivro'],
            ':idAutor' => $dados['idAutor'],
            ':idEditora' => $dados['idEditora'],
            ':idLivro' => $dados['idLivro']
        ]);
    }





    public function buscarLivroid(int $id)
    {

        $sql = "SELECT 
                livro.*,
                autor.nomeautor,
                editora.nomeeditora
            FROM livro
            INNER JOIN autor
                ON livro.idautor = autor.idautor
            INNER JOIN editora
                ON livro.ideditora = editora.ideditora
            WHERE livro.idlivro = :id";

        $stmt = $this->conexao->prepare($sql);

        $stmt->execute([
            ':id' => $id
        ]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }




    public function buscarLivro(string $termo)
    {
        $sql = "SELECT l.*
FROM livro l
JOIN autor a
    ON l.idautor = a.idautor
JOIN editora e
    ON l.ideditora = e.ideditora
WHERE l.titulo ILIKE :termo
   OR a.nomeautor ILIKE :termo
   OR e.nomeeditora ILIKE :termo";

        $stmt = $this->conexao->prepare($sql);

        $stmt->execute([
            ':termo' => "%{$termo}%"
        ]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    

  public function listarLivros()
{
    $sql = "SELECT 
                l.idlivro,
                l.titulo,
                l.capalivro,
                l.isbn,
                l.numeropaginas,
                l.ano,
                l.idioma,
                a.nomeautor,
                e.nomeeditora
            FROM livro l
            JOIN autor a   ON a.idautor   = l.idautor
            JOIN editora e ON e.ideditora = l.ideditora
            ORDER BY l.titulo ASC";

    $stmt = $this->conexao->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


public function buscarLivroFiltrado(string $termo, string $filtro): array
    {
        $coluna = match ($filtro) {
            'editora' => 'e.nomeeditora',
            'autor' => 'a.nomeautor',
            default  => 'l.titulo',
        };

        $sql = "SELECT l.idlivro, l.titulo, l.capalivro
            FROM livro l
            JOIN autor a ON l.idautor = a.idautor
            JOIN editora e ON l.ideditora = e.ideditora
            WHERE $coluna LIKE :termo";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([':termo' => '%' . $termo . '%']);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }











}

