<script>
    import Nav from './lib/components/Nav.svelte';
    import Dashboard from './routes/Dashboard.svelte';
    import Edit from './routes/Edit.svelte';

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

<Nav>
    <button onclick={() => navigate("/")}>Dashboard</button>
    <button onclick={() => navigate("/about")}>Edit</button> 
</Nav>

{#if currentRoute === "/"}
    <Dashboard />
{:else if currentRoute === "/edit"}
    <Edit />
{:else}
    <h1>Página no encontrada</h1>
{/if}


<style>
    button{
        cursor: pointer;

        font-size: 1rem;
        font-weight: normal;

        background-color: #151515;
        color: #ffffffde;

        border: none;
        padding: 10px 15px;
    }
</style>