<!-- resources/views/components/loading-screen.blade.php -->
<div id="loading-screen" class="loading-screen hidden">
    <img src="{{ asset('loading.webp') }}" alt="Cargando..." class="loading-gif">
</div>

<style>
    .loading-screen {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(255, 255, 255, 0.9);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 9999;
        transition: opacity 0.5s ease;
    }

    .loading-screen.hidden {
        opacity: 0;
        pointer-events: none;
    }

    .loading-gif {
        width: 120px; /* Ajusta el tamaño del WebP según sea necesario */
        height: 120px; /* Ajusta el tamaño del WebP según sea necesario */
    }
</style>

