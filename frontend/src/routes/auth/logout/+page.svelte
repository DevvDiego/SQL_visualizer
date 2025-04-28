<script>
    import { base } from "$app/paths";
    import { onMount } from "svelte";


    // fetch("http://localhost:80"+ base +"/backend/api/app.php", {
    //     method: "POST",
    //     headers: {
    //         "Content-Type": "application/json"
    //     },
    //     credentials: "include" // Necesario para cookies de sesión
    // })
    // .then((res)=>{
    //     // api_data = res.json();
        
    // })
    


    async function loadData(){
        const res = await fetch("http://localhost:80"+ base +"/backend/auth/logout.php", {
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

<!-- ! Como obtendre los datos y asegurare que la sesion sigue siendo valida? -->
<!-- ? tendria que enviar en cada solicitud la cookie y en la cookie en user_id
?      y ya ahi se manda a php y en php verificamos si existe esa sesion??  
-->
<h1>LOGGIN OUT</h1>
