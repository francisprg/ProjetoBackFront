<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Livro</title>
    <link rel="stylesheet" href="/public/css/style.css">
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

            <h1 class="editar-perfil-titulo">Cadastrar Livro</h1>

            <form
                class="editar-perfil-form"
                action="../index.php?acao=cadastrarLivro"
                method="POST"
                enctype="multipart/form-data"
            >

                <div class="editar-perfil-campo">
                    <label class="editar-perfil-label" for="titulo">Título do Livro</label>
                    <input id="titulo" type="text" name="titulo" required>
                </div>

                <div class="editar-perfil-linha-dupla">
                    <div class="editar-perfil-campo">
                        <label class="editar-perfil-label" for="isbn">ISBN</label>
                        <input id="isbn" type="text" name="isbn" required>
                    </div>
                    <div class="editar-perfil-campo">
                        <label class="editar-perfil-label" for="ano">Ano</label>
                        <input id="ano" type="number" name="ano" required>
                    </div>
                </div>

                <div class="editar-perfil-linha-dupla">
                    <div class="editar-perfil-campo">
                        <label class="editar-perfil-label" for="numeroPaginas">Número de Páginas</label>
                        <input id="numeroPaginas" type="number" name="numeroPaginas" required>
                    </div>
                    <div class="editar-perfil-campo">
                        <label class="editar-perfil-label" for="idioma">Idioma</label>
                        <input id="idioma" type="text" name="idioma" required>
                    </div>
                </div>

                <div class="editar-perfil-divider"></div>

                <div class="editar-perfil-campo">
                    <label class="editar-perfil-label" for="idAutor">Autor</label>
                    <select id="idAutor" name="idAutor" required>
                        <option value="">Selecione um autor</option>
                        <?php foreach ($autores as $autor): ?>
                            <option value="<?= $autor['idautor'] ?>">
                                <?= $autor['nomeautor'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="editar-perfil-campo">
                    <label class="editar-perfil-label" for="idEditora">Editora</label>
                    <select id="idEditora" name="idEditora" required>
                        <option value="">Selecione uma editora</option>
                        <?php foreach ($editoras as $editora): ?>
                            <option value="<?= $editora['ideditora'] ?>">
                                <?= $editora['nomeeditora'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="editar-perfil-divider"></div>

                <div class="editar-perfil-campo">
                    <label class="editar-perfil-label" for="fotoLivro">Capa do Livro</label>
                    <input id="fotoLivro" type="file" name="fotoLivro" accept=".jpeg, .png, .jpg, .webp">
                    <small>Formatos aceitos: JPG, PNG ou WEBP.</small>
                </div>

                <div class="editar-perfil-acoes">
                    <a class="editar-perfil-cancelar" href="../index.php?acao=home">Cancelar</a>
                    <button class="editar-perfil-salvar" type="submit">Cadastrar Livro</button>
                </div>

            </form>
        </div>
    </main>

    <?php require __DIR__ . "/partials/footer.php" ?>

    <script src="/public/js/header.js"></script>
</body>

</html>