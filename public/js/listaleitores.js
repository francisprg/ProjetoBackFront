let todosLeitores = [];

async function carregarLeitores() {
    const response  = await fetch("/api/api.php?acao=listarleitores");
    todosLeitores   = await response.json();
    renderizar(todosLeitores);
}

function renderizar(lista) {
    document.querySelector(".lista-leitores").innerHTML = lista.map(leitor => `
        <div class="cartao-leitor">
        
            <span>${leitor.nomeleitor}</span>
           <a href="index.php?acao=deletarLeitor&id=${leitor.idleitor}" class="acao-deletar"><button>Deletar Leitor</button></a>
          
        </div>
    `).join("");
}

carregarLeitores();