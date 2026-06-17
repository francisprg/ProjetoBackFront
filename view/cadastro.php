<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>


    <?php if (!empty($erros)): ?>
    <div class="erro">
        <?php foreach ($erros as $erro): ?>
            <p><?= htmlspecialchars($erro, ENT_QUOTES, 'UTF-8'); ?></p>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>



<form action="../index.php?acao=cadastrar" method="POST" enctype="multipart/form-data">

        <label>Nome:</label>
        <br>
        <input type="text" name="nomeLeitor" required>
        <br><br>

        <label>Sobrenome:</label>
        <br>
        <input type="text" name="sobrenomeLeitor" required>
        <br><br>

        <label>Apelido:</label>
        <br>
        <input type="text" name="apelidoLeitor">
        <br><br>

        <label>Email:</label>
        <br>
        <input type="email" name="emailLeitor" required>
        <br><br>

        <label>Senha:</label>
        <br>
        <input type="password" name="senhaLeitor" required>
        <br><br>

        <label>Data de Nascimento:</label>
        <br>
        <input type="date" name="datanascLeitor">
        <br><br>

        <label>Bio:</label>
        <br>
        <textarea name="bioLeitor" rows="4" cols="30"></textarea>
        <br><br>

        <label>Foto:</label>
        <br>
        <input type="file" name="fotoLeitor" placeholder="URL ou nome da foto" accept=".jpg,.jpeg,.bmp,.png">
        <br><br>

        <button type="submit">
            Cadastrar
        </button>
        
    </form>

</body>
</html>