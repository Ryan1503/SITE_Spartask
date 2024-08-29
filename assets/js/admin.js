document.addEventListener("DOMContentLoaded", function () {
    const toggleBtn = document.querySelector('.spartask-toggle-btn');
    const sidebar = document.querySelector('.spartask-sidebar');
    const content = document.querySelector('.spartask-content');

    // Função para alternar a visibilidade da sidebar
    toggleBtn.addEventListener('click', function () {
        sidebar.classList.toggle('active');
        content.classList.toggle('full-width');
    });

    // Alterna a classe 'active' nos links do menu ao carregar a página
    const links = document.querySelectorAll('.admin-link');
    links.forEach(link => {
        if (link.href === window.location.href) {
            link.classList.add('active');
        } else {
            link.classList.remove('active');
        }
    });
});
