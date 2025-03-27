<script>
    import Nav from './lib/components/Nav.svelte';

    import Dashboard from './routes/Dashboard.svelte';
    import Ciudadanos from './routes/Ciudadanos.svelte';
    import Departamentos from './routes/Departamentos.svelte';
    import Cursos from './routes/Cursos.svelte';
    import Profesores from './routes/Profesores.svelte';

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
    <button onclick={() => navigate("/departamentos")}>Departamentos</button> 
    <button onclick={() => navigate("/cursos")}>Cursos</button> 
    <button onclick={() => navigate("/profesores")}>Profesores</button> 
</Nav>

{#if currentRoute === "/"}
    <Dashboard />
{:else if currentRoute === "/departamentos"}
    <Departamentos />
{:else if currentRoute === "/cursos"}
    <Cursos />
{:else if currentRoute === "/profesores"}
    <Profesores />
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