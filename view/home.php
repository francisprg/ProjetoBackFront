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




  <form action="index.php?acao=buscarlivro" method="POST">

    <input type="text" name="termo" placeholder="Buscar livros">

    <button>Buscar</button>
  </form>












    <h1>Lista de livros</h1>

    <pre>
</pre>
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
    

<h1>Melhores avaliados</h1>


<?php foreach($livrosAvaliados as $livroavaliado): ?>
    <p>
        <a href="index.php?acao=visualizarlivro&id=<?= (int)$livroavaliado['idlivro'] ?>">
            <img
                src="../imagens/<?= $livroavaliado['capalivro'] ?>"
                width="100"
            >

            <br><br>

            <?= $livroavaliado['titulo'] ?>
        </a>
    </p>

    <hr>
    <br>
<?php endforeach; ?>   



    <?php if ($_SESSION['leitor']['admin']): ?>
    <a href="index.php?acao=visualizarcadlivro">Cadastrar livro</a>
    <?php endif; ?>  

    <a href="index.php?acao=visualizarperfil&id=<?=$_SESSION['leitor']['idleitor']?>">
    Meu perfil
    </a>
    
    <a href="index.php?acao=logout">Sair da conta</a>
    <footer>
        <div id="conteudofooter">
            <div id="contatosfooter">
                <h1>Logo</h1>
                <p>O site de livros que voce deseja</p>

                <div id="redessociaisfooter"></div>
            </div>
    </div>





    </footer>

</body>
</html>