

const filtrobotao = document.querySelector(".filtro-btn")


let todosLivros = [];

async function carregarLivros() {
  try {
    const response = await fetch("/api/api.php?acao=listarlivros");
    const texto = await response.text(); // texto primeiro para debugar
    console.log(texto); // veja o que a API retorna de fato
    todosLivros = JSON.parse(texto);
    renderizar(todosLivros);
  } catch (e) {
    console.error("Erro ao carregar livros:", e);
  }
}

carregarLivros();

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
});

document.querySelector("#btn-recentes").addEventListener("click", () => {
    
  const filtrados = [...todosLivros]
    .sort((a, b) => b.idlivro - a.idlivro); //
  renderizar(filtrados);
});


document.querySelectorAll(".filtro-btn").forEach(btn => {
    btn.addEventListener("click", () => {
        document.querySelectorAll(".filtro-btn").forEach(b => b.classList.remove("ativo"));
        btn.classList.add("ativo");
    });
});
