const fotoLeitor = document.getElementById('foto-leitor');
const fotoLeitorInput = document.getElementById('foto-leitor-input');

fotoLeitorInput.addEventListener('change', () => {
    fotoLeitor.src = URL.createObjectURL(fotoLeitorInput.files[0]);
});


function definirErro(input, span, mensagem) {
    span.textContent = mensagem;
    input.setAttribute('aria-invalid', mensagem ? 'true' : 'false');
    return mensagem === '';
}

const form = document.querySelector('.editar-perfil-form');

const nomeInput       = document.getElementById('nomeLeitor');
const sobrenomeInput  = document.getElementById('sobrenomeLeitor');
const emailInput      = document.getElementById('emailLeitor');
const senhaInput      = document.getElementById('senhaleitor');
const nascimentoInput = document.getElementById('datanascLeitor');

const erroNome       = document.getElementById('erro-nomeLeitor');
const erroSobrenome  = document.getElementById('erro-sobrenomeLeitor');
const erroEmail      = document.getElementById('erro-emailLeitor');
const erroSenha      = document.getElementById('erro-senhaleitor');
const erroNascimento = document.getElementById('erro-datanascLeitor');

function validarNome() {
    if (nomeInput.value.trim() === '') {
        return definirErro(nomeInput, erroNome, 'O nome é obrigatório.');
    }
    return definirErro(nomeInput, erroNome, '');
}

function validarSobrenome() {
    if (sobrenomeInput.value.trim() === '') {
        return definirErro(sobrenomeInput, erroSobrenome, 'O sobrenome é obrigatório.');
    }
    return definirErro(sobrenomeInput, erroSobrenome, '');
}

function validarEmail() {
    const valor = emailInput.value.trim();

    if (valor === '') {
        return definirErro(emailInput, erroEmail, 'O e-mail é obrigatório.');
    }

    if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(valor)) {
        return definirErro(emailInput, erroEmail, 'Digite um e-mail válido.');
    }

    return definirErro(emailInput, erroEmail, '');
}

function validarSenha() {
    // Senha é opcional aqui: só valida se o usuário digitou algo novo.
    if (senhaInput.value !== '' && senhaInput.value.length < 8) {
        return definirErro(senhaInput, erroSenha, 'A senha deve ter no mínimo 8 caracteres.');
    }
    return definirErro(senhaInput, erroSenha, '');
}

function validarNascimento() {
    if (nascimentoInput.value === '') {
        return definirErro(nascimentoInput, erroNascimento, '');
    }

    const nascimento = new Date(nascimentoInput.value);
    const hoje = new Date();

    if (nascimento > hoje) {
        return definirErro(nascimentoInput, erroNascimento, 'A data não pode ser no futuro.');
    }

    return definirErro(nascimentoInput, erroNascimento, '');
}

nomeInput.addEventListener('blur', validarNome);
sobrenomeInput.addEventListener('blur', validarSobrenome);
emailInput.addEventListener('blur', validarEmail);
senhaInput.addEventListener('blur', validarSenha);
nascimentoInput.addEventListener('blur', validarNascimento);

form.addEventListener('submit', (event) => {
    const validacoes = [
        { ok: validarNome(), campo: nomeInput },
        { ok: validarSobrenome(), campo: sobrenomeInput },
        { ok: validarEmail(), campo: emailInput },
        { ok: validarSenha(), campo: senhaInput },
        { ok: validarNascimento(), campo: nascimentoInput },
    ];

    const primeiroInvalido = validacoes.find(v => !v.ok);

    if (primeiroInvalido) {
        event.preventDefault();
        primeiroInvalido.campo.focus();
    }
});