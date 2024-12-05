import './bootstrap';
import $ from 'jquery';

// Función para mostrar la pantalla de carga
function showLoadingScreen() {
    $('#loading-screen').removeClass('hidden');
}

// Función para ocultar la pantalla de carga
function hideLoadingScreen() {
    $('#loading-screen').addClass('hidden');
    setTimeout(() => {
        $('#loading-screen').hide();
    }, 500); // Tiempo de la transición en milisegundos
}

// Ocultar la pantalla de carga al cargar el documento
$(document).ready(function() {
    hideLoadingScreen();
});

// Exportar las funciones para que puedan ser llamadas desde otros scripts
window.showLoadingScreen = showLoadingScreen;
window.hideLoadingScreen = hideLoadingScreen;


document.getElementById('torneos-container').addEventListener('mousemove', function(e) {
    const container = e.currentTarget;
    const carousel = document.getElementById('carousel');

    const containerWidth = container.offsetWidth;
    const carouselWidth = carousel.scrollWidth;

    // Calcular la posición del cursor dentro del contenedor
    const mouseX = e.clientX - container.getBoundingClientRect().left;
    
    // Calcular el porcentaje del movimiento del cursor
    const scrollPercent = mouseX / containerWidth;

    // Definir un factor de velocidad
    const speedFactor = 1.5;  // Aumenta este valor para mayor velocidad

    // Calcular el desplazamiento horizontal ajustado por la velocidad
    const scrollPosition = (carouselWidth - containerWidth) * scrollPercent * speedFactor;

    // Aplicar el desplazamiento horizontal al carrusel
    carousel.scrollLeft = scrollPosition;
});




//////////////////Lógica Torneos/////////////////
document.addEventListener("DOMContentLoaded", function () {
    const gameFilter = document.getElementById('game-filter');
    const torneoContainers = document.querySelectorAll('[data-game]');
    const searchInput = document.getElementById('search-dropdown');

    // Filtrar torneos por el tipo de juego seleccionado en el dropdown
    gameFilter.addEventListener('change', function () {
        const selectedGame = gameFilter.value;

        torneoContainers.forEach(function (container) {
            const gameType = container.getAttribute('data-game');
            if (selectedGame === 'all' || gameType === selectedGame) {
                container.style.display = "block"; // Mostrar el contenedor
            } else {
                container.style.display = "none"; // Ocultar el contenedor
            }
        });
    });


    // Filtrar los torneos por búsqueda
    searchInput.addEventListener('input', function () {
        const searchTerm = searchInput.value.toLowerCase();
        torneoContainers.forEach(function (container) {
            const title = container.querySelector('h3').textContent.toLowerCase();
            if (title.includes(searchTerm)) {
                container.style.display = "block"; // Mostrar el contenedor
            } else {
                container.style.display = "none"; // Ocultar el contenedor
            }
        });
    });
});


document.querySelectorAll('[data-drawer-target]').forEach(button => {
    button.addEventListener('click', () => {
        const drawerId = button.getAttribute('data-drawer-target');
        const drawer = document.getElementById(drawerId);
        drawer.classList.toggle('-translate-x-full'); // Abrir y cerrar el modal
    });
});

document.querySelectorAll('[data-drawer-dismiss]').forEach(button => {
    button.addEventListener('click', () => {
        const drawerId = button.getAttribute('aria-controls');
        const drawer = document.getElementById(drawerId);
        drawer.classList.add('-translate-x-full'); // Cerrar el modal
    });
});


