<script>

    let is_logged = $state(true);

    // is_logged = data.user.authenticated


	/** @type {import('./$types').LayoutProps} */
	let { data, children } = $props();
</script>

{#if is_logged}
    
    <h1>DENTRO DE RUTA PROTEGIDA</h1>

    <h3>
        {data}
    </h3>


{:else}
    <h1>No has iniciado sesion</h1>
{/if}