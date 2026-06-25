<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


    <?php foreach($livros as $livro): ?>

    <p>
        <a href="index.php?acao=visualizarlivro&id=<?= (int)($livro['idLivro'] ?? $livro['idlivro'] ?? 0) ?>"><img 
            src="../imagens/<?= $livro['capalivro'] ?>"
            width="100"
        >
        <br><br>
        <?= $livro['titulo'] ?> <br>
        
    </p>
    <hr>

<?php endforeach; ?>
</body>
</html>