function abrirEditarResenha(idResenha, textoAtual) {
    document.getElementById('modal-id-resenha-editar').value = idResenha;
    document.getElementById('modal-textarea-resenha').value = textoAtual;
    document.getElementById('erro-editar-resenha').textContent = '';
    document.getElementById('modal-editar-resenha').classList.add('aberto');
}

function fecharEditarResenha() {
    document.getElementById('modal-editar-resenha').classList.remove('aberto');
}

function onClickLinkEditarResenha(event) {
    const link = event.currentTarget;
    abrirEditarResenha(link.dataset.id, link.dataset.texto);
}

async function salvarEdicaoResenha(event) {
    event.preventDefault();

    const idResenha = document.getElementById('modal-id-resenha-editar').value;
    const texto = document.getElementById('modal-textarea-resenha').value.trim();
    const erro = document.getElementById('erro-editar-resenha');

    if (texto.length < 10) {
        erro.textContent = 'A resenha deve ter pelo menos 10 caracteres.';
        return;
    }

    try {
        const response = await fetch(`/api/api.php?acao=editarresenha`, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ idResenha: parseInt(idResenha), textoResenha: texto })
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

document.querySelectorAll('.link-editar-resenha').forEach(link => {
    link.addEventListener('click', onClickLinkEditarResenha);
});

document.getElementById('btn-fechar-editar-resenha').addEventListener('click', fecharEditarResenha);

document.getElementById('form-editar-resenha').addEventListener('submit', salvarEdicaoResenha);