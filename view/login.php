<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


    <?php if (!empty($erros)): ?>
    <div class="erro">
        <?php foreach ($erros as $erro): ?>
            <p><?= htmlspecialchars($erro, ENT_QUOTES, 'UTF-8'); ?></p>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>

    <form action="../index.php?acao=login" method="POST">

    <label for="">Email</label>
    <input type="text" placeholder="Digite o seu email" name="email">

    <br>
     
    <label for="">Senha</label>
    <input type="text" placeholder="Digite a sua senha" name="senha">

    <br>

    <button>Submit</button>
    </form>

    <a href="/view/cadastro.php"><button>Realizar Cadastro</button></a>

    







</body>
</html>