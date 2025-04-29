<script>
    let { data } = $props();

    let auth = $derived(data.authenticated);

</script>

<!-- ! Como obtendre los datos y asegurare que la sesion sigue siendo valida? -->
<!-- ? tendria que enviar en cada solicitud la cookie y en la cookie en user_id
?      y ya ahi se manda a php y en php verificamos si existe esa sesion??  
-->



<h1 class="bg-blue">
    DENTRO DE RUTA protegida
</h1>

<h1 >
    Are you authed?
    Green is true, red is false
</h1>

<div class="mt-12 m-auto w-14 h-14 block {auth ? "bg-green-400 text-black":"bg-red-400"}">

</div>