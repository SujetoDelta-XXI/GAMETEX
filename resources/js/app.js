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

document.addEventListener("DOMContentLoaded", function () {
    const recompensasFilter = document.getElementById('recompensa-filter'); // Renombrado a recompensasFilter
    const recompensaContainers = document.querySelectorAll('[data-recompensa]'); // Renombrado a recompensaContainers
    const searchInput = document.getElementById('search-dropdown');

    // Filtrar recompensas por el tipo de juego seleccionado en el dropdown
    recompensasFilter.addEventListener('change', function () {
        const selectedRecompensa = recompensasFilter.value; // Renombrado a selectedRecompensa

        recompensaContainers.forEach(function (container) {
            const recompensaType = container.getAttribute('data-recompensa'); // Renombrado a recompensaType
            if (selectedRecompensa === 'all' || recompensaType === selectedRecompensa) {
                container.style.display = "";  // Muestra el contenedor, mantiene su espacio en el layout
            } else {
                container.style.display = "none";  // Oculta el contenedor sin mover los demás
            }
        });
    });


    const rows = document.querySelectorAll('#recompensas-table tr'); // Seleccionamos todas las filas dentro del tbody

    // Función que filtra las filas según el texto de búsqueda
    searchInput.addEventListener('input', function () {
        const searchTerm = searchInput.value.toLowerCase(); // Convertimos el término de búsqueda a minúsculas

        rows.forEach(function (row) {
            // Buscar el contenido del nombre del producto en el slot "producto"
            const productoCell = row.querySelector('td'); // La primera celda es donde se encuentra el nombre del producto
            const productoText = productoCell ? productoCell.textContent.toLowerCase() : '';

            if (productoText.includes(searchTerm)) {
                row.style.display = ''; // Muestra la fila si el nombre del producto coincide
            } else {
                row.style.display = 'none'; // Oculta la fila si no coincide
            }
        });
    });

});



