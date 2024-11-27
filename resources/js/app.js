import './bootstrap';


//////////////////Lógica Torneos/////////////////
document.addEventListener("DOMContentLoaded", function() {
    const gameFilter = document.getElementById('game-filter');
    const torneoContainers = document.querySelectorAll('[data-game]');
    const searchInput = document.getElementById('search-dropdown');

    // Filtrar torneos por el tipo de juego seleccionado en el dropdown
    gameFilter.addEventListener('change', function() {
        const selectedGame = gameFilter.value;

        torneoContainers.forEach(function(container) {
            const gameType = container.getAttribute('data-game');
            if (selectedGame === 'all' || gameType === selectedGame) {
                container.style.display = "block"; // Mostrar el contenedor
            } else {
                container.style.display = "none"; // Ocultar el contenedor
            }
        });
    });

    // Filtrar los torneos por búsqueda
    searchInput.addEventListener('input', function() {
        const searchTerm = searchInput.value.toLowerCase();
        torneoContainers.forEach(function(container) {
            const title = container.querySelector('h3').textContent.toLowerCase();
            if (title.includes(searchTerm)) {
                container.style.display = "block"; // Mostrar el contenedor
            } else {
                container.style.display = "none"; // Ocultar el contenedor
            }
        });
    });
});