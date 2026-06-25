<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/css/style.css">
    <title>Document</title>
</head>

<body>
    <header>
        <div class="nav-esquerda">
            <span class="nav-logo">LiAqui.</span>
            <form action="index.php?acao=buscarlivro" method="POST">
                <input type="text" name="termo" placeholder="Buscar livros">
            </form>
        </div>
        <nav>


            <?php $acaoAtual = $_GET['acao'] ?? ''; ?>

            <ul class="nav-links">
                <li>
                    <a href="index.php?acao=home"
                        class="nav-local <?= ($acaoAtual === '' || $acaoAtual === 'home') ? 'ativo' : '' ?>">
                        Inicio
                    </a>
                </li>
                <li>
                    <a href="index.php?acao=visualizarperfil&id=<?= $_SESSION['leitor']['idleitor'] ?>"
                        class="nav-local <?= $acaoAtual === 'visualizarperfil' ? 'ativo' : '' ?>">
                        Meu perfil
                    </a>
                </li>
            </ul>
        </nav>
        <div class="menu-perfil">
            <img
                src="../imagens/<?= $_SESSION['leitor']['fotoleitor'] ?>"
                alt="Foto do usuário"
                id="foto-perfil-btn">

            <div class="menu-perfil-opcoes" id="menu-perfil-opcoes">
                <a href="index.php?acao=visualizarperfil&id=<?= $_SESSION['leitor']['idleitor'] ?>">Meu perfil</a>
                <a href="index.php?acao=logout" class="sair">Sair da conta</a>
            </div>
        </div>
    </header>
    <script src="/public/js/header.js"></script>
</body>
    
</html> 