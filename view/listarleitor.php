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
   <?php foreach($leitores as $leitor): ?>

    <p>
        
        <img 
        src="/imagens/<?= trim($leitor['fotoleitor']) ?>" 
        width="120"
        >


        ID: <?= $leitor['idleitor'] ?> <br>
        Nome: <?= $leitor['nomeleitor'] ?> <br>
        Sobrenome: <?= $leitor['sobrenomeleitor'] ?> <br>
        Apelido: <?= $leitor['apelidoleitor'] ?> <br>
        Email: <?= $leitor['emailleitor'] ?> <br>
        Data de Nascimento: <?= $leitor['datanascleitor'] ?> <br>
        Bio: <?= $leitor['bioleitor'] ?> <br>

        <br><br>

        <a href="index.php?acao=editarLeitor&id=<?= (int)$leitor['idleitor'] ?>">
            Editar
        </a>

        <a href="index.php?acao=deletarLeitor&id=<?= (int)$leitor['idleitor'] ?>">
            Deletar
        </a>
    </p>

    <hr>

<?php endforeach; ?>
</body>
</html>