
function abrirComentarios(idResenha) {
    document.getElementById('modal-id-resenha').value = idResenha;
    document.getElementById('modal-comentarios').classList.add('aberto');
    carregarComentarios(idResenha);
}

function fecharComentarios() {
    document.getElementById('modal-comentarios').classList.remove('aberto');
    document.getElementById('modal-lista').innerHTML = '';
}

function fecharSeClicarFora(event) {
    if (event.target === document.getElementById('modal-comentarios')) {
        fecharComentarios();
    }
}

async function carregarComentarios(idresenha) {
    const lista = document.getElementById('modal-lista');
    lista.innerHTML = '<p style="color:#8a9ab0;font-size:.85rem;">Carregando...</p>';

    try {
        const params = new URLSearchParams({ acao: 'listarcomentarios', idresenha });
        const response = await fetch(`/api/api.php?${params}`);
        const comentarios = await response.json();

     
        const contador = document.querySelector(
            `[onclick="abrirComentarios(${idresenha})"] .contador-comentarios`
        );
        if (contador) {
            const n = comentarios.length;
            contador.textContent = `${n} ${n === 1 ? 'comentário' : 'comentários'}`;
        }

        if (comentarios.length === 0) {
            lista.innerHTML = `
                <div class="modal-vazio">
                    <svg width="64" height="64" viewBox="0 0 24 24" fill="none"
                         stroke="#5b9bd5" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
                    </svg>
                    Ainda não há nenhum comentário
                </div>`;
            return;
        }

        lista.innerHTML = comentarios.map(c => `
            <div class="comentario-item" data-idcomentario="${c.idcomentario}">
                <img src="/imagens/${c.fotoleitor}" class="comentario-avatar" alt="${c.nomeleitor}">
                <div class="comentario-balao">
                    <div class="comentario-autor">${c.nomeleitor}</div>
                    <div class="comentario-texto">${c.comentario}</div>
                </div>
                ${c.dono ? `
                    <div class="comentario-acoes">
                        <a class="link-editar-comentario" onclick="editarComentario(${c.idcomentario})">Editar</a>
                        <a class="link-deletar-comentario" onclick="deletarComentario(${c.idcomentario})">Deletar</a>
                    </div>
                ` : ''}
            </div>
        `).join('');

    } catch {
        lista.innerHTML = '<p style="color:#c0392b;font-size:.85rem;">Erro ao carregar comentários.</p>';
    }
}

async function enviarComentario(event) {
    event.preventDefault();
    const idResenha = document.getElementById('modal-id-resenha').value;
    const input = document.getElementById('modal-input');
    const texto = input.value.trim();
    if (!texto) return;

    try {
        const response = await fetch(`/api/api.php?acao=criarcomentario`, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ idResenha: parseInt(idResenha), textoComentario: texto })
        });
        const res = await response.json();

        if (res.sucesso) {
            input.value = '';
            carregarComentarios(idResenha);
        } else {
            alert(res.erro ?? 'Erro ao enviar comentário.');
        }
    } catch {
        alert('Erro de conexão.');
    }
}

async function deletarComentario(idcomentario) {
    const idResenha = document.getElementById('modal-id-resenha').value;

    try {
        const response = await fetch(`/api/api.php?acao=deletarcomentario`, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ idcomentario })
        });
        await response.json();
        carregarComentarios(idResenha);
    } catch {
        alert('Erro ao deletar comentário.');
    }
}

function editarComentario(idcomentario) {
    const balao = document.querySelector(`[data-idcomentario="${idcomentario}"] .comentario-texto`);
    const textoAtual = balao.textContent;

    balao.contentEditable = true;
    balao.focus();
    balao.style.outline = '1.5px solid #5b9bd5';
    balao.style.borderRadius = '4px';

    balao.onblur = async () => {
        const novoTexto = balao.textContent.trim();
        balao.contentEditable = false;
        balao.style.outline = '';

        if (!novoTexto || novoTexto === textoAtual) return;

        const idResenha = document.getElementById('modal-id-resenha').value;

        try {
            const response = await fetch(`/api/api.php?acao=editarcomentario`, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ idcomentario, textoComentario: novoTexto })
            });
            await response.json();
            carregarComentarios(idResenha);
        } catch {
            alert('Erro ao editar comentário.');
        }
    };
}