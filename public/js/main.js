// ===== ABAS =====

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

btnLogin.addEventListener('click', () => trocarAba('login'));
btnCadastro.addEventListener('click', () => trocarAba('cadastro'));
linkCadastro.addEventListener('click', () => trocarAba('cadastro'));
linkLogin.addEventListener('click', () => trocarAba('login'));


// ===== PREVIEW DE IMAGEM =====

const imagemPerfil = document.getElementById('imagem-perfil');
const inputArquivo = document.getElementById('input-arquivo');

inputArquivo.addEventListener('change', () => {
    imagemPerfil.src = URL.createObjectURL(inputArquivo.files[0]);
});


// ===== VALIDAÇÃO — LOGIN =====

const emailLoginInput = document.getElementById('email-input');
const senhaLoginInput = document.getElementById('senha-input');
const erroEmailLogin  = document.getElementById('erro-email');
const erroSenhaLogin  = document.getElementById('erro-senha');

emailLoginInput.addEventListener('blur', () => {
    erroEmailLogin.textContent = emailLoginInput.value.trim() === '' ? 'O e-mail é obrigatório.' : '';
});

senhaLoginInput.addEventListener('blur', () => {
    erroSenhaLogin.textContent = senhaLoginInput.value === '' ? 'A senha é obrigatória.' : '';
});


// ===== VALIDAÇÃO — CADASTRO =====

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

nomeInput.addEventListener('blur', () => {
    erroNome.textContent = nomeInput.value.trim() === '' ? 'O nome é obrigatório.' : '';
});

sobrenomeInput.addEventListener('blur', () => {
    erroSobrenome.textContent = sobrenomeInput.value.trim() === '' ? 'O sobrenome é obrigatório.' : '';
});

emailCadInput.addEventListener('blur', () => {
    if (emailCadInput.value.trim() === '') {
        erroEmailCad.textContent = 'O e-mail é obrigatório.';
    } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailCadInput.value.trim())) {
        erroEmailCad.textContent = 'Digite um e-mail válido.';
    } else {
        erroEmailCad.textContent = '';
    }
});

senhaCadInput.addEventListener('blur', () => {
    if (senhaCadInput.value === '') {
        erroSenhaCad.textContent = 'A senha é obrigatória.';
    } else if (senhaCadInput.value.length < 8) {
        erroSenhaCad.textContent = 'A senha deve ter no mínimo 8 caracteres.';
    } else {
        erroSenhaCad.textContent = '';
    }
});

nascimentoInput.addEventListener('blur', () => {
    if (nascimentoInput.value === '') {
        erroNascimento.textContent = '';
        return;
    }

    const nascimento = new Date(nascimentoInput.value);
    const hoje = new Date();

    if (nascimento > hoje) {
        erroNascimento.textContent = 'A data não pode ser no futuro.';
    } else {
        erroNascimento.textContent = '';
    }
});