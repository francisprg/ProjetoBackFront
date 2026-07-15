const fotoBtn = document.getElementById('foto-perfil-btn');
const menuOpcoes = document.getElementById('menu-perfil-opcoes');

function fecharMenuPerfil() {
    menuOpcoes.classList.remove('aberto');
}

function alternarMenuPerfil(event) {
    event.stopPropagation();
    menuOpcoes.classList.toggle('aberto');
}

document.addEventListener('click', fecharMenuPerfil);
fotoBtn.addEventListener('click', alternarMenuPerfil);


const btnHamburguer = document.getElementById('btn-menu-hamburguer');
const navPrincipal = document.getElementById('nav-principal');

function alternarMenuHamburguer(event) {
    event.stopPropagation();
    const aberto = navPrincipal.classList.toggle('aberto');
    btnHamburguer.classList.toggle('aberto', aberto);
    btnHamburguer.setAttribute('aria-expanded', aberto);
}

function fecharMenuHamburguerSeClicarFora(event) {
    const clicouDentro = navPrincipal.contains(event.target) || btnHamburguer.contains(event.target);

    if (!clicouDentro) {
        navPrincipal.classList.remove('aberto');
        btnHamburguer.classList.remove('aberto');
        btnHamburguer.setAttribute('aria-expanded', 'false');
    }
}

if (btnHamburguer && navPrincipal) {
    btnHamburguer.addEventListener('click', alternarMenuHamburguer);
    document.addEventListener('click', fecharMenuHamburguerSeClicarFora);
}