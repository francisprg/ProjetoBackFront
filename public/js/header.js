const fotoBtn = document.getElementById("foto-perfil-btn");
const menuOpcoes = document.getElementById("menu-perfil-opcoes");

fotoBtn.addEventListener("click", (e) => {
    e.stopPropagation();
    menuOpcoes.classList.toggle("aberto");
});


document.addEventListener("click", () => {
    menuOpcoes.classList.remove("aberto");
});
