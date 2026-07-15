const textoresenha = document.getElementById('textoresenha');
const erro         = document.getElementById('erro-resenha');
const formresenha  = document.getElementById('form-resenha');

function validarResenha() {
    const valor = textoresenha.value.trim();

    if (valor.length === 0) {
        erro.textContent    = 'Escreva algo antes de enviar!';
        erro.style.color    = 'red';
        erro.style.fontSize = '0.85rem';
        return false;
    }

    if (valor.length < 10) {
        erro.textContent    = 'A resenha deve ter pelo menos 10 caracteres.';
        erro.style.color    = 'red';
        erro.style.fontSize = '0.85rem';
        return false;
    }

    erro.textContent = '';
    return true;
}

textoresenha.addEventListener('blur', validarResenha);

formresenha.addEventListener('submit', (event) => {
    if (!validarResenha()) {
        event.preventDefault();
        textoresenha.focus();
    }
});