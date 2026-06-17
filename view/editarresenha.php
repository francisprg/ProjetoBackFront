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
    <h1>Editar Resenha</h1>

<form method="POST" action="index.php?acao=atualizarresenha">

    <input
        type="hidden"
        name="idresenha"
        value="<?= $resenha['idresenha'] ?>">

        <br>
        <br>

    <textarea name="textoresenha">
<?= htmlspecialchars($resenha['textoresenha']) ?>
    </textarea>

    <button type="submit">Salvar</button>

</form>

</body>
</html>