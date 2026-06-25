<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/css/style.css">
    <title>Perfil — LiAqui</title>
</head>

<body>
    <?php
    if (!isset($_SESSION['leitor'])) {
        header('Location: login.php');
        exit;
    }
    ?>

    <?php require __DIR__ . "/partials/header.php" ?>

    <main class="perfil">
        <div class="container-perfil">
            <!-- Sidebar esquerda -->
            <aside class="perfil-sidebar">
                <img src="imagens/<?= $leitor['fotoleitor'] ?>" alt="Foto de <?= $leitor['nomeleitor'] ?>" class="perfil-foto">

                <h2 class="perfil-nome"><?= $leitor['nomeleitor'] ?></h2>
                <span class="perfil-usuario">@<?= $leitor['apelidoleitor'] ?></span>
                <p class="perfil-bio"><?= $leitor['bioleitor'] ?></p>

                <?php if ($ehDonoDoPerfil): ?>
                    <a href="index.php?acao=editarLeitor&id=<?= (int)$_SESSION['leitor']['idleitor'] ?>" class="perfil-btn">
                        Editar Perfil
                    </a>
                    <a href="index.php?acao=deletarleitor&id=<?= (int)$_SESSION['leitor']['idleitor'] ?>" class="perfil-btn-deletar">
                        Deletar minha conta
                    </a>
                <?php endif; ?>

                <div class="perfil-stats">
                    <div class="perfil-stat">
                        <span class="perfil-stat-label">RESENHAS</span>
                        <strong><?= count($resenhas) ?></strong>
                    </div>
                </div>
            </aside>

            <!-- Conteúdo direita -->
            <section class="perfil-conteudo">
                <h1>
                    <?php if ($ehDonoDoPerfil): ?>
                        Meu Perfil
                    <?php else: ?>
                        Perfil do Usuário
                    <?php endif; ?>
                </h1>

                <h2 class="perfil-secao-titulo">Histórico de resenhas</h2>

                <?php if (empty($resenhas)): ?>
                    <p class="perfil-vazio">Nenhuma resenha publicada ainda.</p>
                <?php endif; ?>

                <?php foreach ($resenhas as $resenha): ?>
                    <div class="cartao-resenha">
                        <img
                            src="imagens/<?= $resenha['capalivro'] ?>"
                            alt="Capa de <?= htmlspecialchars($resenha['titulo']) ?>"
                            class="cartao-resenha-capa">

                        <div class="cartao-resenha-info">
                            <h3><?= htmlspecialchars($resenha['titulo']) ?></h3>
                            <?php if (!empty($resenha['textoresenha'])): ?>
                                <p class="cartao-resenha-texto"><?= htmlspecialchars($resenha['textoresenha']) ?></p>
                            <?php endif; ?>

                            <span class="cartao-resenha-data"><?= $resenha['dataresenha'] ?></span>

                            <?php if ($ehDonoDoPerfil && !empty($resenha['textoresenha'])): ?>
                                <div class="cartao-resenha-acoes">
                                    <a href="index.php?acao=editarresenha&id=<?= (int)($resenha['idresenha'] ?? 0) ?>">Editar</a>
                                    <a href="index.php?acao=deletarresenha&id=<?= (int)($resenha['idresenha'] ?? 0) ?>" class="acao-deletar">Deletar</a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>

            </section>

        </div>
    </main>

    <?php require __DIR__ . "/partials/footer.php" ?>
</body>

</html>