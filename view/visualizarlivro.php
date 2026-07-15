<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/css/style.css">
    <title>LiAqui</title>
</head>



<body>


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




    <?php require __DIR__ . "/partials/header.php" ?>

    <?php
    if (!isset($_SESSION['leitor'])) {
        header('Location: login.php');
        exit;
    }
    ?>

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
                <button class="modal-fechar" onclick="fecharComentarios()" aria-label="Fechar">✕</button>
            </div>

            <div id="modal-lista" class="modal-lista">
                <!-- comentários carregados via JS -->
            </div>

            <form class="modal-form" onsubmit="enviarComentario(event)">
                <input type="hidden" id="modal-id-resenha" value="">
                <label for="modal-input" class="visually-hidden">Adicionar um comentário</label>
                <input
                    type="text"
                    id="modal-input"
                    placeholder="Adicionar um comentário"
                    autocomplete="off">
                <button type="submit" aria-label="Enviar comentário">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="22" y1="2" x2="11" y2="13" />
                        <polygon points="22 2 15 22 11 13 2 9 22 2" />
                    </svg>
                </button>
            </form>
        </div>
    </div>



    <main class="livro">
        <section class="container-livro">

            <aside class="livro-sidebar">
                <img src="../imagens/<?= $livro['capalivro'] ?>" alt="Capa de <?= htmlspecialchars($livro['titulo']) ?>">
            </aside>

            <div class="conteudo-livro">
                <h1><?= htmlspecialchars($livro['titulo']) ?></h1>
                <h2><?= htmlspecialchars($livro['nomeautor']) ?></h2>

                <div class="info-livro">
                    <div class="info-livro-item">
                        <svg class="info-livro-icone" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <rect x="3" y="4" width="18" height="16" rx="2" />
                            <path d="M7 4v16" />
                            <path d="M11 8h6" />
                            <path d="M11 12h6" />
                            <path d="M11 16h4" />
                        </svg>
                        <span><strong>ISBN:</strong> <?= $livro['isbn'] ?></span>
                    </div>
                    <div class="info-livro-item">
                        <svg class="info-livro-icone" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M6 3h9l5 5v13H6z" />
                            <path d="M15 3v5h5" />
                            <path d="M9 13h6" />
                            <path d="M9 17h6" />
                        </svg>
                        <span><strong>Páginas:</strong> <?= $livro['numeropaginas'] ?></span>
                    </div>
                    <div class="info-livro-item">
                        <svg class="info-livro-icone" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <circle cx="12" cy="12" r="9" />
                            <path d="M3 12h18" />
                            <path d="M12 3c2.5 2.6 4 6 4 9s-1.5 6.4-4 9c-2.5-2.6-4-6-4-9s1.5-6.4 4-9Z" />
                        </svg>
                        <span><strong>Idioma:</strong> <?= $livro['idioma'] ?></span>
                    </div>
                </div>
                    <section class="container-resenha-avaliacao">
                        <div class="container-resenha">
                            <?php if ($minhaResenha): ?>
                                <h3>Sua resenha</h3>
                                <p><?= htmlspecialchars($minhaResenha['textoresenha']) ?></p>
                                <button type="button" class="link-editar-resenha" data-id="<?= (int) $minhaResenha['idresenha'] ?>" data-texto="<?= htmlspecialchars($minhaResenha['textoresenha'], ENT_QUOTES) ?>">
                                    Editar resenha
                                </button>
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

                        <section class="secao-resenhas">
                            <h2>Últimas resenhas</h2>
                            <?php foreach ($resenhas as $resenha): ?>
                                <div class="cartao-resenha-livro">
                                    <div class="cartao-resenha-livro-cabecalho">

                                        <div class="carta-resenha-livro-cabecalho-leitor-info">
                                            <img
                                                src="/imagens/<?= $resenha['fotoleitor'] ?>"
                                                alt="Foto de <?= htmlspecialchars($resenha['nomeleitor']) ?>"
                                                class="resenha-avatar">
                                            <a href="index.php?acao=visualizarperfil&id=<?= $resenha['idleitor'] ?>">
                                                <?= htmlspecialchars($resenha['nomeleitor']) ?>
                                            </a>
                                        </div>

                                        <div class="carta-rsenha-livro-cabecalho-resenha-data">
                                            <small class="resenha-data"><?= $resenha['dataresenha'] ?></small>
                                        </div>

                                    </div>
                                    <p class="resenha-texto"><?= htmlspecialchars($resenha['textoresenha']) ?></p>


                                    <button type="button" class="link-comentarios" onclick="abrirComentarios(<?= $resenha['idresenha'] ?>)">
                                        <img src="/imagens/comente.png" alt="" class="icone-comentario">

                                        <?php if (empty($resenha['total_comentarios'])): ?>
                                            Comentar
                                        <?php else: ?>
                                            <?= $resenha['total_comentarios'] ?> comentário<?= $resenha['total_comentarios'] == 1 ? '' : 's' ?>
                                        <?php endif; ?>
                                    </button>
                                </div>
                            <?php endforeach; ?>
                        </section>
                    </section>
            </div>
        </section>
    </main>

    <?php require __DIR__ . "/partials/footer.php" ?>


    <script src="/public/js/header.js"></script>
    <script src="/public/js/comentarios.js"></script>
    <script src="/public/js/livro.js"></script>
    <script src="/public/js/editarresenha.js"></script>
    <script src="/public//js/avaliacao.js"></script>
</body>

</html>