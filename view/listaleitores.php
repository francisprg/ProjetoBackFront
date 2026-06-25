<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leitores — LiAqui</title>
    <link rel="stylesheet" href="/public/css/style.css">
</head>

<body>

    <?php require __DIR__ . "/partials/header.php" ?>

    <main class="listaleitoresadm">
        <div class="container-lista-leitores">

            <div class="cabecalho-lista-leitores">
                <h1>Leitores cadastrados</h1>
            </div>

            <div class="lista-leitores"></div>

        </div>
    </main>

    <?php require __DIR__ . "/partials/footer.php" ?>

    <script src="/public/js/listaleitores.js"></script>

</body>

</html>