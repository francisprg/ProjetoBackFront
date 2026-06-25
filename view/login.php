<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — LiAqui</title>
    <link rel="stylesheet" href="/public/css/style.css">
</head>

<body>
    <main class="login-cadastro">
        <div class="auth-card">
            <div class="auth-side">
                <div class="auth-side-divider"></div>
                <h2>Bem-vindo ao LiAqui</h2>
                <p>Registre suas leituras, escreva resenhas e descubra novos livros.</p>
            </div>

            <div class="auth-main">

                <div class="auth-tabs">
                    <button class="tab-btn ativo" id="btn-login">Entrar</button>
                    <button class="tab-btn" id="btn-cadastro">Cadastrar</button>
                </div>

                <div class="auth-panels">

                    <!-- Login -->
                    <div id="painel-login" class="auth-panel ativo">

                        <?php if (!empty($erros)): ?>
                            <div class="erros-servidor">
                                <?php foreach ($erros as $erro): ?>
                                    <p><?= htmlspecialchars($erro, ENT_QUOTES, 'UTF-8') ?></p>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>

                        <form action="../index.php?acao=login" method="POST" novalidate>

                            <div class="campo">
                                <label for="email-input">Email</label>
                                <input id="email-input" type="email" name="email" placeholder="seu@email.com" autocomplete="email">
                                <span class="erro-msg" id="erro-email"></span>
                            </div>

                            <div class="campo">
                                <label for="senha-input">Senha</label>
                                <input id="senha-input" type="password" name="senha" placeholder="••••••••" autocomplete="current-password">
                                <span class="erro-msg" id="erro-senha"></span>
                            </div>

                            <button class="btn-primario" type="submit">Entrar</button>

                        </form>

                        <p class="auth-footer">
                            Ainda não tem conta? <a id="link-para-cadastro">Cadastre-se</a>
                        </p>

                    </div>

                    <!-- Cadastro -->
                    <div id="painel-cadastro" class="auth-panel">

                        <form action="../index.php?acao=cadastrar" method="POST" enctype="multipart/form-data" novalidate>

                            <div class="container-foto">
                                <img src="/imagens/default.webp" alt="" id="imagem-perfil">
                                <input id="input-arquivo" name="fotoLeitor" type="file" accept=".jpeg, .png, .jpg, .webp">
                                <label for="input-arquivo" class="btn-primario">Selecionar Imagem</label>
                            </div>

                            <div class="campos-duplos">
                                <div class="campo">
                                    <label for="nome-input">Nome</label>
                                    <input id="nome-input" type="text" name="nomeLeitor" placeholder="Nome" required autocomplete="given-name">
                                    <span class="erro-msg" id="erro-nome"></span>
                                </div>
                                <div class="campo">
                                    <label for="sobrenome-input">Sobrenome</label>
                                    <input id="sobrenome-input" type="text" name="sobrenomeLeitor" placeholder="Sobrenome" required autocomplete="family-name">
                                    <span class="erro-msg" id="erro-sobrenome"></span>
                                </div>
                            </div>

                            <div class="campo">
                                <label for="apelido-input">Apelido (opcional)</label>
                                <input id="apelido-input" type="text" name="apelidoLeitor" placeholder="Como quer ser chamado?">

                                <label for="email-cad-input">Email</label>
                                <input id="email-cad-input" type="email" name="emailLeitor" placeholder="seu@email.com" required autocomplete="email">
                                <span class="erro-msg" id="erro-email-cad"></span>

                                <label for="senha-cad-input">Senha</label>
                                <input id="senha-cad-input" type="password" name="senhaLeitor" placeholder="Mínimo 8 caracteres" required autocomplete="new-password">
                                <span class="erro-msg" id="erro-senha-cad"></span>

                                <label for="nascimento-input">Data de nascimento</label>
                                <input id="nascimento-input" type="date" name="datanascLeitor">
                                <span class="erro-msg" id="erro-nascimento"></span>
                            </div>

                            <button class="btn-primario" type="submit">Criar conta</button>

                        </form>

                        <p class="auth-footer">
                            Já tem conta? <a id="link-para-login">Faça login</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="/public/js/main.js"></script>

</body>

</html>


 <a href="index.php?acao=deletarresenha&id=<?= (int)($resenha['idresenha'] ?? 0) ?>" class="acao-deletar"><button>Deletar Resenha</button></a>