<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Livro</title>
</head>
<body>
    

<?php
    if (!isset($_SESSION['leitor'])) {
    header('Location: login.php');
    exit;
    }
?>
    <h1>Cadastrar Livro</h1>

    <form 
        action="../index.php?acao=cadastrarLivro" 
        method="POST"
        enctype="multipart/form-data"
    >

        <label>Título do Livro</label>
        <input 
            type="text" 
            name="titulo"
            required
        >

        <br><br>

        <label>ISBN</label>
        <input 
            type="text" 
            name="isbn"
            required
        >

        <br><br>

        <label>Número de Páginas</label>
        <input 
            type="number" 
            name="numeroPaginas"
            required
        >

        <br><br>

        <label>Ano</label>
        <input 
            type="number" 
            name="ano"
            required
        >

        <br><br>

        <label>Idioma</label>
        <input 
            type="text" 
            name="idioma"
            required
        >

        <br><br>

        <label>Foto do Livro</label>
        <input 
            type="file" 
            name="fotoLivro"
        >

        <br><br>

        <label>Autor</label>
        <select name="idAutor" required>

            <option value="">
                Selecione um autor
            </option>

            <?php foreach($autores as $autor): ?>

                <option value="<?= $autor['idautor'] ?>">
                    <?= $autor['nomeautor'] ?>
                </option>

            <?php endforeach; ?>

        </select>

        <br><br>

        <label>Editora</label>
        <select name="idEditora" required>

            <option value="">
                Selecione uma editora
            </option>

            <?php foreach($editoras as $editora): ?>

                <option value="<?= $editora['ideditora'] ?>">
                    <?= $editora['nomeeditora'] ?>
                </option>

            <?php endforeach; ?>

        </select>

        <br><br>

        <button type="submit">
            Cadastrar Livro
        </button>
                <a href="../index.php?acao=listarlivros">
    Listar Livros
</a>
    </form>

</body>
</html>