<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/css/style.css">
    <title>LiAqui — Livro</title>
</head>

<body>

    <?php require __DIR__ . "/partials/header.php" ?>

    <?php
    if (!isset($_SESSION['leitor'])) {
        header('Location: login.php');
        exit;
    }
    ?>

    <main class="livro">
        <section class="container-livro">

            <aside class="livro-sidebar">
                <img src="../imagens/<?= $livro['capalivro'] ?>" alt="Capa de <?= htmlspecialchars($livro['titulo']) ?>">
            </aside>

            <div class="conteudo-livro">
                <h1><?= htmlspecialchars($livro['titulo']) ?></h1>
                <h2><?= htmlspecialchars($livro['nomeautor']) ?></h2>

                <div class="info-livro">
                    <div class="isbn-livro">
                        <strong>ISBN:</strong> <?= $livro['isbn'] ?>
                    </div>
                    <div class="paginas-livro">
                        <strong>Páginas:</strong> <?= $livro['numeropaginas'] ?>
                    </div>
                    <div class="idioma-livro">
                        <strong>Idioma:</strong> <?= $livro['idioma'] ?>
                    </div>
                </div>

                <section class="container-resenha-avaliacao">
                        <div class="container-resenha">
                            <?php if ($minhaResenha): ?>
                                <h3>Sua resenha</h3>
                                <p><?= htmlspecialchars($minhaResenha['textoresenha']) ?></p>
                                <a href="index.php?acao=editarresenha&id=<?= $minhaResenha['idresenha'] ?>">
                                    Editar resenha
                                </a>
                            <?php else: ?>
                                <form method="POST" id="form-resenha" action="index.php?acao=criarresenha">
                                    <input type="hidden" name="idLivro" value="<?= $livro['idlivro'] ?>">
                                    <label for="textoresenha">Sua resenha</label>
                                    <textarea id="textoresenha" name="textoresenha" placeholder="Escreva sua resenha..."></textarea>
                                    <div id="erro-resenha" role="alert"></div>
                                    <button type="submit">Criar resenha</button>
                                </form>
                            <?php endif; ?>
                        </div>
                    </div>
                </section>

                <section class="secao-resenhas">
                    <h2>Últimas resenhas</h2>

                    <?php foreach ($resenhas as $resenha): ?>
                        <div class="cartao-resenha-livro">
                            <div class="cartao-resenha-livro-cabecalho">
                                <img
                                    src="/imagens/<?= $resenha['fotoleitor'] ?>"
                                    alt="Foto de <?= htmlspecialchars($resenha['nomeleitor']) ?>"
                                    class="resenha-avatar">
                                <a href="index.php?acao=visualizarperfil&id=<?= $resenha['idleitor'] ?>">
                                    <?= htmlspecialchars($resenha['nomeleitor']) ?>
                                </a>
                            </div>
                            <p class="resenha-texto"><?= htmlspecialchars($resenha['textoresenha']) ?></p>
                            <small class="resenha-data"><?= $resenha['dataresenha'] ?></small>
                        </div>
                    <?php endforeach; ?>
                </section>
            </div>

        </section>
    </main>

    <?php require __DIR__ . "/partials/footer.php" ?>

    <script src="/public/js/livro.js"></script>
</body>

</html>