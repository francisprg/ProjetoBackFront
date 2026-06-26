// Filtros da lista de leitura por status
document.addEventListener('DOMContentLoaded', () => {
    const botoes  = document.querySelectorAll('.filtro-lista');
    const cartoes = document.querySelectorAll('.cartao-lista-leitura');

    botoes.forEach(btn => {
        btn.addEventListener('click', () => {
            botoes.forEach(b => b.classList.remove('ativo'));
            btn.classList.add('ativo');

            const statusFiltro = btn.dataset.status;

            cartoes.forEach(cartao => {
                if (statusFiltro === 'todos' || cartao.dataset.status === statusFiltro) {
                    cartao.style.display = 'flex';
                } else {
                    cartao.style.display = 'none';
                }
            });
        });
    });
});