<script>
    import { base } from "$app/paths";
    import { onMount } from "svelte";

    async function loadData(){
        const res = await fetch("http://localhost:80"+ base +"/backend/api/app.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            credentials: "include" // Necesario para cookies de sesión
        });
        api_data = await res.json();
        console.log(api_data);
    }
    let api_data = $state("");
    onMount(loadData);


	let { data, children } = $props();
</script>


<h1>DENTRO DE RUTA PROTEGIDA</h1>

<h2>Usuario: {data.user.username}</h2>
<h2>Datos de la api protegida: {api_data}</h2>
