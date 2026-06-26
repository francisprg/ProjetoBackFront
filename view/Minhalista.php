<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/css/style.css">
    <title>Minha Lista — LiAqui</title>
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
                <img src="imagens/<?= $_SESSION['leitor']['fotoleitor'] ?>"
                     alt="Foto de <?= htmlspecialchars($_SESSION['leitor']['nomeleitor']) ?>"
                     class="perfil-foto">

                <h2 class="perfil-nome"><?= htmlspecialchars($_SESSION['leitor']['nomeleitor']) ?></h2>
                <span class="perfil-usuario">@<?= htmlspecialchars($_SESSION['leitor']['apelidoleitor']) ?></span>

                <div class="perfil-stats">
                    <?php
                    $totalLido      = count(array_filter($lista, fn($i) => $i['status'] === 'lido'));
                    $totalLendo     = count(array_filter($lista, fn($i) => $i['status'] === 'lendo'));
                    $totalQueroLer  = count(array_filter($lista, fn($i) => $i['status'] === 'quero_ler'));
                    ?>
                    <div class="perfil-stat">
                        <span class="perfil-stat-label">LIDOS</span>
                        <strong><?= $totalLido ?></strong>
                    </div>
                    <div class="perfil-stat">
                        <span class="perfil-stat-label">LENDO</span>
                        <strong><?= $totalLendo ?></strong>
                    </div>
                    <div class="perfil-stat">
                        <span class="perfil-stat-label">QUERO LER</span>
                        <strong><?= $totalQueroLer ?></strong>
                    </div>
                </div>

                <a href="index.php?acao=visualizarperfil&id=<?= (int)$_SESSION['leitor']['idleitor'] ?>" class="perfil-btn">
                    Ver meu perfil
                </a>
            </aside>

            <!-- Conteúdo direita -->
            <section class="perfil-conteudo">
                <h1>Minha Lista de Leitura</h1>

                <!-- Filtros por status -->
                <div class="lista-leitura-filtros">
                    <button class="filtro-lista ativo" data-status="todos">Todos</button>
                    <button class="filtro-lista" data-status="quero_ler">Quero Ler</button>
                    <button class="filtro-lista" data-status="lendo">Lendo</button>
                    <button class="filtro-lista" data-status="lido">Lido</button>
                </div>

                <?php if (empty($lista)): ?>
                    <p class="perfil-vazio">Sua lista de leitura está vazia. Adicione livros pela página de cada livro!</p>
                <?php endif; ?>

                <?php foreach ($lista as $item): ?>
                    <div class="cartao-resenha cartao-lista-leitura" data-status="<?= $item['status'] ?>">
                        <a href="index.php?acao=visualizarlivro&id=<?= (int)$item['idlivro'] ?>">
                            <img
                                src="imagens/<?= htmlspecialchars($item['capalivro']) ?>"
                                alt="Capa de <?= htmlspecialchars($item['titulo']) ?>"
                                class="cartao-resenha-capa">
                        </a>

                        <div class="cartao-resenha-info">
                            <h3>
                                <a href="index.php?acao=visualizarlivro&id=<?= (int)$item['idlivro'] ?>" class="lista-livro-titulo">
                                    <?= htmlspecialchars($item['titulo']) ?>
                                </a>
                            </h3>
                            <span class="lista-livro-autor"><?= htmlspecialchars($item['nomeautor']) ?></span>
                            <span class="cartao-resenha-data">Adicionado em <?= $item['dataadicionado'] ?></span>

                            <!-- Formulário inline para trocar status -->
                            <form method="POST" action="index.php?acao=atualizarstatusalista" class="lista-status-form">
                                <input type="hidden" name="idLista" value="<?= (int)$item['idlista'] ?>">
                                <select name="status" class="lista-status-select" onchange="this.form.submit()">
                                    <option value="quero_ler" <?= $item['status'] === 'quero_ler' ? 'selected' : '' ?>>Quero Ler</option>
                                    <option value="lendo"     <?= $item['status'] === 'lendo'     ? 'selected' : '' ?>>Lendo</option>
                                    <option value="lido"      <?= $item['status'] === 'lido'      ? 'selected' : '' ?>>Lido</option>
                                </select>
                            </form>

                            <div class="cartao-resenha-acoes">
                                <a href="index.php?acao=removerdalistadeleitura&id=<?= (int)$item['idlista'] ?>"
                                   class="acao-deletar"
                                   onclick="return confirm('Remover este livro da lista?')">
                                    Remover da lista
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

            </section>
        </div>
    </main>

    <?php require __DIR__ . "/partials/footer.php" ?>

    <script src="/public/js/listaleitura.js"></script>
</body>

</html>