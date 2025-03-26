<script>
    import Home from "./routes/Home.svelte";
    import About from './routes/About.svelte';

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
  <button on:click={() => navigate("/")}>Inicio</button>
  <button on:click={() => navigate("/about")}>Sobre Nosotros</button>
  <button on:click={() => navigate("/contact")}>Contacto</button>
</nav>

{#if currentRoute === "/"}
  <Home />
{:else if currentRoute === "/about"}
  <About />
{:else}
  <h1>Página no encontrada</h1>
{/if}

