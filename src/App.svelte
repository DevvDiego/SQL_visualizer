<script>
    import Dashboard from './routes/Dashboard.svelte';

    let currentRoute = "/";

    const navigate = (route) => {
        currentRoute = route; // Cambiar ruta sin recargar la página
        window.history.pushState({}, "", route); // Actualizar la URL sin recarga
    };

    // Escuchar cambios de historial (permite usar botones de navegación del navegador)
    window.onpopstate = () => {
        currentRoute = window.location.pathname;
    };
</script>

<nav>
    <button onclick={() => navigate("/")}>Dashboard</button>
</nav>

{#if currentRoute === "/"}
    <Dashboard />
<!-- {:else if currentRoute === "/about"}
    <About /> -->
{:else}
    <h1>Página no encontrada</h1>
{/if}

