const painelLogin    = document.getElementById('painel-login');
const painelCadastro = document.getElementById('painel-cadastro');
const btnLogin       = document.getElementById('btn-login');
const btnCadastro    = document.getElementById('btn-cadastro');
const linkCadastro   = document.getElementById('link-para-cadastro');
const linkLogin      = document.getElementById('link-para-login');

function trocarAba(aba) {
    const eLogin = aba === 'login';

    painelLogin.classList.toggle('ativo', eLogin);
    painelCadastro.classList.toggle('ativo', !eLogin);
    btnLogin.classList.toggle('ativo', eLogin);
    btnCadastro.classList.toggle('ativo', !eLogin);
}

btnLogin.addEventListener('click', () => {
    trocarAba('login');
});

btnCadastro.addEventListener('click', () => {
    trocarAba('cadastro');
});

linkCadastro.addEventListener('click', () => {
    trocarAba('cadastro');
});

linkLogin.addEventListener('click', () => {
    trocarAba('login');
});


const imagemPerfil = document.getElementById('imagem-perfil');
const inputArquivo = document.getElementById('input-arquivo');

inputArquivo.addEventListener('change', () => {
    if (inputArquivo.files[0]) {
        imagemPerfil.src = URL.createObjectURL(inputArquivo.files[0]);
    }
});



function definirErro(input, span, mensagem) {
    span.textContent = mensagem;

    if (mensagem) {
        input.setAttribute('aria-invalid', 'true');
    } else {
        input.setAttribute('aria-invalid', 'false');
    }

    return mensagem === '';
}

const formLogin        = document.querySelector('#painel-login form');
const emailLoginInput  = document.getElementById('email-input');
const senhaLoginInput  = document.getElementById('senha-input');
const erroEmailLogin   = document.getElementById('erro-email');
const erroSenhaLogin   = document.getElementById('erro-senha');

function validarEmailLogin() {
    const valor = emailLoginInput.value.trim();

    if (valor === '') {
        return definirErro(emailLoginInput, erroEmailLogin, 'O email é obrigatório.');
    }

    return definirErro(emailLoginInput, erroEmailLogin, '');
}

function validarSenhaLogin() {
    if (senhaLoginInput.value === '') {
        return definirErro(senhaLoginInput, erroSenhaLogin, 'A senha é obrigatória.');
    }

    return definirErro(senhaLoginInput, erroSenhaLogin, '');
}

emailLoginInput.addEventListener('blur', validarEmailLogin);
senhaLoginInput.addEventListener('blur', validarSenhaLogin);

formLogin.addEventListener('submit', (event) => {
    const emailOk = validarEmailLogin();
    const senhaOk = validarSenhaLogin();

    if (!emailOk || !senhaOk) {
        event.preventDefault();

        if (emailOk) {
            senhaLoginInput.focus();
        } else {
            emailLoginInput.focus();
        }
    }
});


/* ---------- Cadastro ---------- */

const formCadastro    = document.querySelector('#painel-cadastro form');
const nomeInput       = document.getElementById('nome-input');
const sobrenomeInput  = document.getElementById('sobrenome-input');
const emailCadInput   = document.getElementById('email-cad-input');
const senhaCadInput   = document.getElementById('senha-cad-input');
const nascimentoInput = document.getElementById('nascimento-input');

const erroNome       = document.getElementById('erro-nome');
const erroSobrenome  = document.getElementById('erro-sobrenome');
const erroEmailCad   = document.getElementById('erro-email-cad');
const erroSenhaCad   = document.getElementById('erro-senha-cad');
const erroNascimento = document.getElementById('erro-nascimento');

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

function validarEmailCadastro() {
    const valor = emailCadInput.value.trim();

    if (valor === '') {
        return definirErro(emailCadInput, erroEmailCad, 'O e-mail é obrigatório.');
    }

    if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(valor)) {
        return definirErro(emailCadInput, erroEmailCad, 'Digite um e-mail válido.');
    }

    return definirErro(emailCadInput, erroEmailCad, '');
}

function validarSenhaCadastro() {
    if (senhaCadInput.value === '') {
        return definirErro(senhaCadInput, erroSenhaCad, 'A senha é obrigatória.');
    }

    if (senhaCadInput.value.length < 8) {
        return definirErro(senhaCadInput, erroSenhaCad, 'A senha deve ter no mínimo 8 caracteres.');
    }

    return definirErro(senhaCadInput, erroSenhaCad, '');
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
emailCadInput.addEventListener('blur', validarEmailCadastro);
senhaCadInput.addEventListener('blur', validarSenhaCadastro);
nascimentoInput.addEventListener('blur', validarNascimento);

formCadastro.addEventListener('submit', (event) => {
    const validacoes = [
        { ok: validarNome(), campo: nomeInput },
        { ok: validarSobrenome(), campo: sobrenomeInput },
        { ok: validarEmailCadastro(), campo: emailCadInput },
        { ok: validarSenhaCadastro(), campo: senhaCadInput },
        { ok: validarNascimento(), campo: nascimentoInput },
    ];

    let primeiroInvalido = null;

    for (let i = 0; i < validacoes.length; i++) {
        if (!validacoes[i].ok) {
            primeiroInvalido = validacoes[i];
            break;
        }
    }

    if (primeiroInvalido) {
        event.preventDefault();
        primeiroInvalido.campo.focus();
    }
});