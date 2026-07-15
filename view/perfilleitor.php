<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/css/style.css">
    <title>Perfil</title>
</head>

<body>
    <?php
    if (!isset($_SESSION['leitor'])) {
        header('Location: login.php');
        exit;
    }
    ?>


    <?php require __DIR__ . "/partials/header.php" ?>

    <div id="modal-editar-resenha" class="modal-overlay">
        <div class="modal-box">
            <div class="modal-header">
                <h3>Editar Resenha</h3>
                <button type="button" class="modal-fechar" id="btn-fechar-editar-resenha">✕</button>
            </div>
            <form class="modal-form" id="form-editar-resenha" style="flex-direction: column; gap: 12px;">
                <input type="hidden" id="modal-id-resenha-editar" value="">
                <textarea
                    id="modal-textarea-resenha"
                    rows="6"
                    placeholder="Edite sua resenha..."
                    style="width:100%; resize:vertical; padding: 10px; border-radius: 8px; border: 1px solid #ccc;">
            </textarea>
                <div id="erro-editar-resenha" style="color:red; font-size:.85rem;"></div>
                <button type="submit" class="perfil-btn">Salvar</button>
            </form>
        </div>
    </div>


    <div id="modal-comentarios" class="modal-overlay" onclick="fecharSeClicarFora(event)">
        <div class="modal-box">
            <div class="modal-header">
                <h3>Comentários</h3>
                <button class="modal-fechar" onclick="fecharComentarios()">✕</button>
            </div>

            <div id="modal-lista" class="modal-lista">

            </div>

            <form class="modal-form" onsubmit="enviarComentario(event)">
                <input type="hidden" id="modal-id-resenha" value="">
                <input
                    type="text"
                    id="modal-input"
                    placeholder="Adicionar um comentário"
                    autocomplete="off">
                <button type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="22" y1="2" x2="11" y2="13" />
                        <polygon points="22 2 15 22 11 13 2 9 22 2" />
                    </svg>
                </button>
            </form>
        </div>
    </div>

    <main class="perfil">
        <div class="container-perfil">
            <!-- Sidebar esquerda -->
            <aside class="perfil-sidebar">
                <img src="imagens/<?= $leitor['fotoleitor'] ?>" alt="Foto de <?= $leitor['nomeleitor'] ?>" class="perfil-foto">

                <h2 class="perfil-nome"><?= $leitor['nomeleitor'] ?></h2>
                <span class="perfil-usuario">@<?= $leitor['apelidoleitor'] ?></span>
                <p class="perfil-bio"><?= $leitor['bioleitor'] ?></p>

                <div class="perfil-stats">
                    <div class="perfil-stat">
                        <span class="perfil-stat-label">Resenhas</span>
                        <strong><?= count($resenhas) ?></strong>
                    </div>
                </div>

                <?php if ($ehDonoDoPerfil): ?>
                    <a href="index.php?acao=editarLeitor&id=<?= (int)$_SESSION['leitor']['idleitor'] ?>" class="perfil-btn">
                        Editar Perfil
                    </a>
                    <a href="index.php?acao=deletarleitor&id=<?= (int)$_SESSION['leitor']['idleitor'] ?>" class="perfil-btn-deletar">
                        Deletar minha conta
                    </a>
                <?php endif; ?>
            </aside>


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

                <div class="lista-resenhas">
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
                                    <button type="button" class="link-editar-resenha"
                                        data-id="<?= (int)($resenha['idresenha'] ?? 0) ?>"
                                        data-texto="<?= htmlspecialchars($resenha['textoresenha'], ENT_QUOTES) ?>">
                                        Editar
                                    </button>
                                    <a class="cartao-resenha-acoes-deletar" href="index.php?acao=deletarresenha&id=<?= (int)($resenha['idresenha'] ?? 0) ?>">Deletar</a>

                                    <?php if (!is_null($resenha['qntestrelas'])): ?>
                                        <a class="cartao-resenha-acoes-deletar" href="index.php?acao=deletaravaliacao&id=<?= (int) $resenha['idavaliacao'] ?>">
                                            Deletar avaliação
                                        </a>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                            <button type="button" class="link-comentarios" onclick="abrirComentarios(<?= $resenha['idresenha'] ?>)">
                                <img src="/imagens/comente.png" alt="" class="icone-comentario">

                                <?php if (empty($resenha['total_comentarios'])): ?>
                                    Comentar
                                <?php else: ?>
                                    <?= $resenha['total_comentarios'] ?> comentário<?= $resenha['total_comentarios'] == 1 ? '' : 's' ?>
                                <?php endif; ?>
                            </button>

                        </div>
                    </div>
                <?php endforeach; ?>
                </div>

            </section>

        </div>
    </main>

    <?php require __DIR__ . "/partials/footer.php" ?>

    <script src="/public/js/header.js"></script>
    <script src="/public/js/comentarios.js"></script>
    <script src="/public/js/editarresenha.js"></script>
</body>

</html>