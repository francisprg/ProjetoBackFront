
const estrelas = document.querySelectorAll('.estrela');
const inputEstrelas = document.getElementById('qtdestrelas');
const formAvaliacao = document.getElementById('form-avaliacao');
const textoresenha = document.getElementById("textoresenha");
const erro = document.getElementById("erro-resenha");
const formresenha = document.getElementById("form-resenha")

textoresenha.addEventListener("blur", () => {
    if (textoresenha.value.trim().length < 10) {
        erro.textContent = "A resenha deve ter pelo menos 10 caracteres.";
        erro.style.color = "red";
        erro.style.fontSize = "0.85rem";
    } else {
        erro.textContent = "";
    }
});

formresenha.addEventListener('submit', (e) => {
    if (!textoresenha.value) {
        e.preventDefault();
        alert('Escreva algo antes de enviar!');
    }
});

