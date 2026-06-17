<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body







<?php
    if (!isset($_SESSION['leitor'])) {
    header('Location: login.php');
    exit;
    }
?>
    <p>

        <img 
            src="../imagens/<?= $livro['capalivro'] ?>"
            width="100"
        >

        <br><br>

        Título: <?= $livro['titulo'] ?> <br>
        ISBN: <?= $livro['isbn'] ?> <br>
        Páginas: <?= $livro['numeropaginas'] ?> <br>
        Ano: <?= $livro['ano'] ?> <br>
        Idioma: <?= $livro['idioma'] ?> <br>

        Autor: <?= $livro['nomeautor'] ?> <br>
        Editora: <?= $livro['nomeeditora'] ?> <br>

        <h1>Avalie</h1>

       <form method="POST" action="index.php?acao=avaliarlivro">

    <input 
        type="hidden" 
        name="idLivro" 
        value="<?= $livro['idlivro'] ?>"
    >

    <label>
        <input type="radio" name="qtdestrelas" value="1" required>
        ⭐
    </label>

    <label>
        <input type="radio" name="qtdestrelas" value="2">
        ⭐⭐
    </label>

    <label>
        <input type="radio" name="qtdestrelas" value="3">
        ⭐⭐⭐
    </label>

    <label>
        <input type="radio" name="qtdestrelas" value="4">
        ⭐⭐⭐⭐
    </label>

    <label>
        <input type="radio" name="qtdestrelas" value="5">
        ⭐⭐⭐⭐⭐
    </label>

    <br><br>

    <button type="submit">Avaliar</button>

</form>






        <form method="POST" action="index.php?acao=criarresenha">

    <input 
        type="hidden" 
        name="idLivro" 
        value="<?= $livro['idlivro'] ?>"
    >

    <textarea name="textoresenha"></textarea>

    <button type="submit">
        Criar resenha
    </button>

    </form>


    <h1>Ultimas resenhas</h1>

    <?php foreach ($resenhas as $resenha): ?>

    <div>
        <h3>
            <a href="index.php?acao=visualizarperfil&id=<?= $resenha['idleitor'] ?>">
                <?= htmlspecialchars($resenha['nomeleitor']) ?>
            </a>
        </h3>

        <p>
            <?= htmlspecialchars($resenha['textoresenha']) ?>
        </p>

        <small>
            <?= $resenha['dataresenha'] ?>
        </small>

    </div>

<?php endforeach; ?>










    </p>
        
    <hr>










</body>
</html>