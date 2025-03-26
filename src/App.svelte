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


<!-- 
<script>
    import Button from "./lib/components/Button.svelte";
    import Form from "./lib/components/Form.svelte";
    import Input from "./lib/components/Input.svelte";
    import Nav from "./lib/components/Nav.svelte";
    import Table from "./lib/components/Table.svelte";
    

    let refreshTableCiudadanos = $state(false);
</script>



<Nav/>




<main>

    <section class="showcase">
        
        <Form bind:refresh={refreshTableCiudadanos}>
            <Input title="Nombre" name="nombre" placeholder="..."/>
            <Input title="Edad" name="edad" placeholder="..."/>
            <Input title="Ciudad" name="ciudad" placeholder="..."/>
            <Button type="submit"/>
        </Form> 

                
       <Table bind:refresh={refreshTableCiudadanos} 
            title="Ciudadanos" queryTo={"ciudadano"} 
        /> 

    </section>

</main>



<style>
    .showcase{
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        gap: 20px;

    }

</style> -->
