<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil — LiAqui</title>
    <link rel="stylesheet" href="/public/css/style.css">
    <link rel="stylesheet" href="/public/css/editar-perfil.css">
</head>

<body>

    <?php
    if (!isset($_SESSION['leitor'])) {
        header('Location: login.php');
        exit;
    }
    ?>

    <?php require __DIR__ . "/partials/header.php" ?>

    <main class="editar-perfil">
        <div class="editar-perfil-container">

            <h1 class="editar-perfil-titulo">Editar Perfil</h1>

            <form
                class="editar-perfil-form"
                action="../index.php?acao=atualizarLeitor"
                method="POST"
                enctype="multipart/form-data"
            >

                <input type="hidden" name="idLeitor"   value="<?= $dadosLeitor['idleitor'] ?>">
                <input type="hidden" name="fotoAntiga" value="<?= $dadosLeitor['fotoleitor'] ?>">

                <!-- Foto -->
                <div class="editar-perfil-foto-section">
                    <img id="foto-leitor"
                        class="editar-perfil-foto-atual"
                        src="../imagens/<?= $dadosLeitor['fotoleitor'] ?>"
                        alt="Foto atual"
                    >
                    <div class="editar-perfil-foto-info">
                        <span class="editar-perfil-label">Foto de perfil</span>
                        <label class="editar-perfil-foto-btn" for="foto-leitor-input">Trocar foto</label>
                        <input class="editar-perfil-foto-input" id="foto-leitor-input" type="file" name="fotoLeitor">
                    </div>
                </div>

                <div class="editar-perfil-divider"></div>

                <!-- Campos -->
                <div class="editar-perfil-campos">

                    <div class="editar-perfil-linha-dupla">
                        <div class="editar-perfil-campo">
                            <label class="editar-perfil-label" for="nomeLeitor">Nome</label>
                            <input id="nomeLeitor" type="text" name="nomeLeitor" value="<?= $dadosLeitor['nomeleitor'] ?>">
                        </div>
                        <div class="editar-perfil-campo">
                            <label class="editar-perfil-label" for="sobrenomeLeitor">Sobrenome</label>
                            <input id="sobrenomeLeitor" type="text" name="sobrenomeLeitor" value="<?= $dadosLeitor['sobrenomeleitor'] ?>">
                        </div>
                    </div>

                    <div class="editar-perfil-linha-dupla">
                        <div class="editar-perfil-campo">
                            <label class="editar-perfil-label" for="apelidoLeitor">Apelido</label>
                            <input id="apelidoLeitor" type="text" name="apelidoLeitor" value="<?= $dadosLeitor['apelidoleitor'] ?>">
                        </div>
                        <div class="editar-perfil-campo">
                            <label class="editar-perfil-label" for="datanascLeitor">Data de nascimento</label>
                            <input id="datanascLeitor" type="date" name="datanascLeitor" value="<?= $dadosLeitor['datanascleitor'] ?>">
                        </div>
                    </div>

                    <div class="editar-perfil-campo">
                        <label class="editar-perfil-label" for="emailLeitor">Email</label>
                        <input id="emailLeitor" type="email" name="emailLeitor" value="<?= $dadosLeitor['emailleitor'] ?>">
                    </div>

                    <div class="editar-perfil-campo">
                        <label class="editar-perfil-label" for="senhaleitor">Email</label>
                        <input id="senhaleitor" type="password" name="senhaleitor" value="<?= $dadosLeitor['senhaleitor'] ?>">
                    </div>


                    <div class="editar-perfil-campo">
                        <label class="editar-perfil-label" for="bioLeitor">Bio</label>
                        <textarea id="bioLeitor" name="bioLeitor"><?= $dadosLeitor['bioleitor'] ?></textarea>
                    </div>

                </div>

                <div class="editar-perfil-acoes">
                    <a class="editar-perfil-cancelar" href="index.php?acao=visualizarperfil&id=<?= $_SESSION['leitor']['idleitor'] ?>">Cancelar</a>
                    <button class="editar-perfil-salvar" type="submit">Salvar alterações</button>
                </div>

            </form>
        </div>
    </main>

    <?php require __DIR__ . "/partials/footer.php" ?>



    <script src="/public/js/editarperfil.js"></script>
</body>

</html>