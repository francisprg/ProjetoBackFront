<header>
    <div class="nav-esquerda">
        <a href="index.php?acao=home"><span class="nav-logo">LiAqui.</span></a>
    </div>

    <button type="button" class="menu-hamburguer" id="btn-menu-hamburguer" aria-label="Abrir menu" aria-expanded="false">
        <span></span>
        <span></span>
        <span></span>
    </button>

    <nav id="nav-principal">

        <?php $acaoAtual = $_GET['acao'] ?? ''; ?>

        <ul class="nav-links">
            <li>
                <a href="index.php?acao=home"
                    class="nav-local <?= ($acaoAtual === '' || $acaoAtual === 'home') ? 'ativo' : '' ?>">
                    <svg class="nav-icone" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M3 9.5 12 3l9 6.5" />
                        <path d="M5 9.5V21h14V9.5" />
                        <path d="M9 21v-6h6v6" />
                    </svg>
                    Início
                </a>
            </li>
            <li>
                <a href="index.php?acao=visualizarperfil&id=<?= $_SESSION['leitor']['idleitor'] ?>"
                    class="nav-local <?= $acaoAtual === 'visualizarperfil' ? 'ativo' : '' ?>">
                    <svg class="nav-icone" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <circle cx="12" cy="8" r="4" />
                        <path d="M4 21c0-4.4 3.6-7 8-7s8 2.6 8 7" />
                    </svg>
                    Meu perfil
                </a>
            </li>
        </ul>
    </nav>
    <div class="menu-perfil">
        <button type="button" id="foto-perfil-btn">
            <img
                src="../imagens/<?= $_SESSION['leitor']['fotoleitor'] ?>"
                alt="Foto do usuário"
                class="foto-perfil-img">
        </button>

        <div class="menu-perfil-opcoes" id="menu-perfil-opcoes">
            <a href="index.php?acao=visualizarperfil&id=<?= $_SESSION['leitor']['idleitor'] ?>">Meu perfil</a>
            <a href="index.php?acao=logout" class="sair">Sair da conta</a>
        </div>
    </div>
</header>