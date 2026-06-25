<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/css/style.css">
    <title>LiAqui</title>
</head>

<body>

    <?php
    if (!isset($_SESSION['leitor'])) {
        header('Location: login.php');
        exit;
    }
    ?>

    <?php require __DIR__ . "/partials/header.php" ?>

    <main class="inicio">
        <section class="container-livros">
            <div class="container-livros-cabecalho">
                <h1>Explorar Livros</h1>
                <p>Avalie ou resenhe livros já lidos</p>
                    
                <div class="filtros-home">
                    <button id="btn-todos" class="filtro-btn ativo">Todos</button>
                    <button id="btn-recentes" class="filtro-btn">Recentes</button>
                </div>
            </div>

            <div class="lista-livros">


            </div>
        </section>
        <div class="acoes-usuario">
            <?php if ($_SESSION['leitor']['admin']): ?>
                <a href="index.php?acao=visualizarcadlivro">Cadastrar livro</a>
                 <a href="index.php?acao=listarleitores">Listar Leitores</a>
            <?php endif; ?>
        </div>

    </main>

    <?php require __DIR__ . "/partials/footer.php" ?>


    <script src="/public/js/home.js"></script>
</body>

</html>