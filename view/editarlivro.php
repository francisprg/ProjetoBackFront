<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Livro</title>
</head>
<body>
<?php
    if (!isset($_SESSION['leitor'])) {
    header('Location: login.php');
    exit;
    }
?>
    <h1>Editar Livro</h1>

    <form
        action="../index.php?acao=atualizarlivro"
        method="POST"
        enctype="multipart/form-data"
    >

       
        <input
            type="hidden"
            name="idLivro"
            value="<?= $dadosLivro['idlivro'] ?>"
        >

        <input
        type="hidden"
        name="fotoAntiga"
        value="<?= $dadosLivro['capalivro'] ?>"
        >

        <label>Título do Livro</label>
        <input
            type="text"
            name="titulo"
            value="<?= $dadosLivro['titulo'] ?>"
            required
        >

        <br><br>

        <label>ISBN</label>
        <input
            type="text"
            name="isbn"
            value="<?= $dadosLivro['isbn'] ?>"
            required
        >

        <br><br>

        <label>Número de Páginas</label>
        <input
            type="number"
            name="numeroPaginas"
            value="<?= $dadosLivro['numeropaginas'] ?>"
            required
        >

        <br><br>

        <label>Ano</label>
        <input
            type="number"
            name="ano"
            value="<?= $dadosLivro['ano'] ?>"
            required
        >

        <br><br>

        <label>Idioma</label>
        <input
            type="text"
            name="idioma"
            value="<?= $dadosLivro['idioma'] ?>"
            required
        >

        <br><br>

        <label>Nova Foto do Livro</label>
        <input
            type="file"
            name="fotoLivro"
        >

        <br><br>

        <label>Autor</label>
        <select name="idAutor" required>

            <?php foreach($autores as $autor): ?>

                <option
                    value="<?= $autor['idautor'] ?>"
                    <?= $autor['idautor'] == $dadosLivro['idautor'] ? 'selected' : '' ?>
                >
                    <?= $autor['nomeautor'] ?>
                </option>

            <?php endforeach; ?>

        </select>

        <br><br>

        <label>Editora</label>
        <select name="idEditora" required>

            <?php foreach($editoras as $editora): ?>

                <option
                    value="<?= $editora['ideditora'] ?>"
                    <?= $editora['ideditora'] == $dadosLivro['ideditora'] ? 'selected' : '' ?>
                >
                    <?= $editora['nomeeditora'] ?>
                </option>

            <?php endforeach; ?>

        </select>

        <br><br>

        <button type="submit">
            Atualizar Livro
        </button>

        <a href="../index.php?acao=listarlivros">
            Voltar
        </a>

    </form>

</body>
</html>