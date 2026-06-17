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



<?php if ($ehDonoDoPerfil): ?>
    <h1>Meu Perfil</h1>
<?php else: ?>
    <h1>Perfil do usuário</h1>
<?php endif; ?>


<p><strong>Nome:</strong> <?= $leitor['nomeleitor'] ?></p>

<p><strong>Usuário:</strong> <?= $leitor['apelidoleitor'] ?></p>

<?php if ($ehDonoDoPerfil): ?>
    <a href="index.php?acao=editarLeitor&id=<?= (int) ($_SESSION['leitor']['idleitor']) ?>">
        Editar Perfil
    </a>
<?php endif; ?>

<h1>Historico de resenhas</h1>

<?php foreach ($resenhas as $resenha): ?>

    <h3>
        <img 
            src="../imagens/<?= $resenha['capalivro'] ?>"
            width="100"
        >   
         <p>
            <?= htmlspecialchars($resenha['titulo']) ?>
        </p>
        

        <p>
            <?= htmlspecialchars($resenha['textoresenha']) ?>
        </p>

        <small>
            <?= $resenha['dataresenha'] ?>
        </small>

    </div>


    <?php if ($ehDonoDoPerfil): ?>
    <a href="index.php?acao=deletarresenha&id=<?= (int) ($resenha['idresenha'] ?? 0) ?>">Deletar resenha</a>

    <a href="index.php?acao=editarresenha&id=<?= (int) ($resenha['idresenha'] ?? 0) ?>">Editar Resenha</a>
    <?php endif; ?>    




<?php endforeach; ?>


















</body>
</html>