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
        <section class="hero-busca">
            <p class="hero-busca-eyebrow">LiAqui</p>
            <h1 class="hero-busca-titulo">O que você vai ler hoje?</h1>
            <p class="hero-busca-sub">Explore uma curadoria de obras clássicas e contemporâneas. Avalie, resenhe e organize os livros que já leu.</p>

            <div class="busca-avancada busca-avancada--hero">
                <svg class="hero-busca-icone" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <circle cx="11" cy="11" r="7"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg>
                <input type="text" placeholder="Busque por título, autor ou editora">
                <div class="busca-avancada-separador"></div>
                <label for="busca-filtro" class="visually-hidden">Filtrar por</label>
                <select class="busca-filtro" id="busca-filtro">
                    <option value="titulo">Titulo</option>
                    <option value="autor">Autor</option>
                    <option value="editora">Editora</option>
                </select>
            </div>
        </section>

        <section class="container-livros">
            <div class="filtros-home">
                <button id="btn-todos" class="filtro-btn ativo">Todos</button>
                <button id="btn-recentes" class="filtro-btn">Recentes</button>
                <button id="btn-portugues" class="filtro-btn">Portugues</button>
                <button id="btn-ingles" class="filtro-btn">Ingles</button>
            </div>

            <p class="resultados-titulo" id="resultados-titulo"></p>
            <div class="lista-livros">


            </div>
        </section>
        <div class="acoes-usuario">
            <?php if ($_SESSION['leitor']['admin']): ?>
                <a href="index.php?acao=visualizarcadlivro">Cadastrar livro</a>
            <?php endif; ?>
        </div>

    </main>

    <?php require __DIR__ . "/partials/footer.php" ?>


    <script src="/public/js/header.js"></script>
    <script src="/public/js/home.js"></script>
</body>

</html>