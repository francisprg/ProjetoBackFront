let todosLivros = [];

function mostrarCarregando() {
    document.querySelector(".lista-livros").innerHTML = `
        <div class="estado-carregamento" role="status" aria-live="polite">
            <div class="spinner" aria-hidden="true"></div>
            <span>Carregando livros...</span>
        </div>
    `;
}

function mostrarErro(mensagem) {
    document.querySelector(".lista-livros").innerHTML = `
        <div class="estado-erro" role="alert">
            <span>${mensagem}</span>
        </div>
    `;
}

async function carregarLivros() {
    mostrarCarregando();
    try {
        const response = await fetch('/api/api.php?acao=listarlivros');
        if (!response.ok) throw new Error('Falha na requisição');
        todosLivros = await response.json();
        atualizarContadores();

        const filtroGuardado = localStorage.getItem("filtroHome");
        if (filtroGuardado) {
            document.querySelector("#btn-" + filtroGuardado).click();
        } else {
            renderizar(todosLivros);
        }
    } catch (error) {
        console.error('Erro ao carregar livros:', error);
        mostrarErro('Não foi possível carregar os livros. Tente novamente mais tarde.');
    }
}

carregarLivros();

function atualizarContadores() {
    const contagem = todosLivros.reduce((acc, livro) => {
        acc[livro.idioma] = (acc[livro.idioma] || 0) + 1;
        return acc;
    }, {});

    document.querySelector("#btn-todos").textContent = `Todos (${todosLivros.length})`;
    document.querySelector("#btn-portugues").textContent = `Portugues (${contagem["Português"] || 0})`;
    document.querySelector("#btn-ingles").textContent = `Ingles (${contagem["Ingles"] || 0})`;
}

async function buscarLivros() {
    const termo  = document.querySelector('.busca-avancada input').value.trim();
    const filtro = document.querySelector('#busca-filtro').value;

    if (termo === '') {
        renderizar(todosLivros);
        return;
    }

    mostrarCarregando();
    try {
        const params = new URLSearchParams({ acao: 'buscarLivroFiltrado', termo, filtro });
        const response = await fetch(`/api/api.php?${params}`);
        if (!response.ok) throw new Error('Falha na requisição');
        const resultado = await response.json();
        renderizar(resultado);
    } catch (error) {
        console.error('Erro na busca:', error);
        mostrarErro('Não foi possível concluir a busca. Tente novamente.');
    }
}

let debounceTimer;
document.querySelector('.busca-avancada input').addEventListener('input', () => {
    clearTimeout(debounceTimer);
    debounceTimer = setTimeout(buscarLivros, 400);
});

document.querySelector('#busca-filtro').addEventListener('change', buscarLivros);


function renderizar(lista) {
    document.querySelector(".lista-livros").innerHTML = lista.map(livro => `
        <div class="cartao-livro">
            <a href="index.php?acao=visualizarlivro&id=${livro.idlivro}">
                <img src="/imagens/${livro.capalivro}" alt="${livro.titulo}">
                <span>${livro.titulo}</span>
            </a>
        </div>
    `).join("");
}

document.querySelector("#btn-todos").addEventListener("click", () => {
    renderizar(todosLivros);
    localStorage.setItem("filtroHome", "todos");
});

document.querySelector("#btn-recentes").addEventListener("click", () => {
    const filtrados = [...todosLivros].sort((a, b) => b.idlivro - a.idlivro);
    renderizar(filtrados);
    localStorage.setItem("filtroHome", "recentes");
});

document.querySelector("#btn-portugues").addEventListener("click", () => {
    const filtrados = [...todosLivros].filter(livro => livro.idioma === "Português");
    renderizar(filtrados)
    localStorage.setItem("filtroHome", "portugues");
});

document.querySelector("#btn-ingles").addEventListener("click", () => {
    const filtrados = [...todosLivros].filter(livro => livro.idioma === "Ingles");
    renderizar(filtrados)
    localStorage.setItem("filtroHome", "ingles");
});


document.querySelectorAll(".filtro-btn").forEach(btn => {
    btn.addEventListener("click", () => {
        document.querySelectorAll(".filtro-btn").forEach(b => b.classList.remove("ativo"));
        btn.classList.add("ativo");
    });
});