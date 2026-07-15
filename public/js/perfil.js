

function abrirEditarResenha(idResenha, textoAtual) {
    document.getElementById('modal-id-resenha-editar').value = idResenha;
    document.getElementById('modal-textarea-resenha').value = textoAtual;
    document.getElementById('erro-editar-resenha').textContent = '';
    document.getElementById('modal-editar-resenha').classList.add('aberto');
}

function fecharEditarResenha() {
    document.getElementById('modal-editar-resenha').classList.remove('aberto');
}

async function salvarResenha(event) {
    event.preventDefault();

    const idResenha = document.getElementById('modal-id-resenha-editar').value;
    const texto     = document.getElementById('modal-textarea-resenha').value.trim();
    const erro      = document.getElementById('erro-editar-resenha');

    if (texto.length < 10) {
        erro.textContent = 'A resenha deve ter pelo menos 10 caracteres.';
        return;
    }

    try {
        const response = await fetch(`/api/api.php?acao=editarresenha`, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ idResenha: parseInt(idResenha, 10), textoResenha: texto })
        });

        const res = await response.json();

        if (res.sucesso) {
            fecharEditarResenha();
            location.reload();
        } else {
            erro.textContent = res.erro ?? 'Erro ao salvar.';
        }
    } catch {
        erro.textContent = 'Erro de conexão.';
    }
}


document.addEventListener('DOMContentLoaded', () => {

    const btnFecharEditar = document.querySelector('#modal-editar-resenha .modal-fechar');
    if (btnFecharEditar) {
        btnFecharEditar.addEventListener('click', fecharEditarResenha);
    }

    const formEditar = document.querySelector('#modal-editar-resenha .modal-form');
    if (formEditar) {
        formEditar.addEventListener('submit', salvarResenha);
    }

    document.addEventListener('click', (event) => {
        const gatilho = event.target.closest('[data-abrir-editar-resenha]');
        if (!gatilho) return;

        const id    = parseInt(gatilho.dataset.idResenha, 10);
        const texto = gatilho.dataset.textoResenha;

        abrirEditarResenha(id, texto);
    });
});

