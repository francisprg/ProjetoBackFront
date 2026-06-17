<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
    if (!isset($_SESSION['leitor'])) {
    header('Location: login.php');
    exit;
    }
?>
    
<?php foreach($livros as $livro): ?>

    <p>

        <img 
            src="../imagens/<?= $livro['capalivro'] ?>"
            width="100"
        >

        <br><br>

        Título: <?= $livro['titulo'] ?? '' ?> <br>
        ISBN: <?= $livro['isbn'] ?? '' ?> <br>
        Páginas: <?= $livro['numeroPaginas'] ?? ($livro['numeropaginas'] ?? '') ?> <br>
        Ano: <?= $livro['ano'] ?? '' ?> <br>
        Idioma: <?= $livro['idioma'] ?? '' ?> <br>

        Autor: <?= $livro['nomeautor'] ?? '' ?> <br>
        Editora: <?= $livro['nomeeditora'] ?? '' ?> <br>


        <a href="index.php?acao=editarlivro&id=<?= (int)($livro['idLivro'] ?? $livro['idlivro'] ?? 0) ?>">
            Editar
        </a>
        <a href="index.php?acao=deletarlivro&id=<?= (int)($livro['idLivro'] ?? $livro['idlivro'] ?? 0) ?>">
            Deletar
        </a>

    </p>
        
    <hr>

<?php endforeach; ?>
    









</body>
</html>