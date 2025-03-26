<script>
    import { onMount } from "svelte";

    //? Might remove onmount? $effect already runs once at component mount
    onMount(()=>{
        //send Table.svelte propr "queryTo"
        getData(queryTo); 
    })

    $effect(()=>{
        if(refresh){
            getData(queryTo);
        }
    })

    function getData(queryTo){
        fetch("http://localhost/www/sveltecrud/backend/select.php?queryTo="+queryTo)
        .then(response => {
            return response.json();
        })
        .then(json => {
            console.log("datos de tabla cargados");
            data = json;

            refresh = false; //we think the table might have been refreshed, so we falsy it
        })

    }

    let data = $state(null);



    let { caption, queryTo, refresh = $bindable() } = $props();
</script>



<table>
    <caption>{caption}</caption>
    <thead>
        {#if !data}
            <tr>
                <th class="skeleton"></th>
                <th class="skeleton"></th>
                <th class="skeleton"></th>
            </tr>
        {:else if data}
            <tr>
                {#each data.columns as column}
                    <th>{column}</th>
                {/each}
            </tr>
        {/if}
    </thead>
    <tbody>
        {#if !data}
            <tr>
                <td class="skeleton"></td>
                <td class="skeleton"></td>
                <td class="skeleton"></td>
            </tr>
            <tr>
                <td class="skeleton"></td>
                <td class="skeleton"></td>
                <td class="skeleton"></td>
            </tr>
            <tr>
                <td class="skeleton"></td>
                <td class="skeleton"></td>
                <td class="skeleton"></td>
            </tr>
        {:else if data}
            {#each data.fields as field}
                <tr>
                    <td>{field.nombre}</td>
                    <td>{field.edad}</td>
                    <td>{field.ciudad}</td>
                </tr>
            {/each}
        {/if}
    </tbody>
</table>

<style>
    
    table{
        background-color: #151515;

        width: 90%;
        margin: auto;

    }

    table caption{
        
        font-size: 1.3rem;
        font-weight: bold;
        text-align: left;
        padding: 10px;
    }

    th, td{
        font-weight: 600;
        font-size: 1rem;
        text-align: center;

        padding: 10px 5px;
        box-shadow: 0px 0px 4px #ffffff41;
    }


    tbody tr:nth-child(odd){
        background-color: #282828;
    }
    
    /* Estilo base para el contenedor de carga */
    .skeleton {
        height: 100%;
        padding: 15px;

        background: linear-gradient(90deg, #151515 25%, #303030 50%, #151515 75%);
        background-size: 200% 100%;
        animation: skeleton-animation 1.2s infinite;
    }

    /* Animación para el efecto de "esqueleto" */
    @keyframes skeleton-animation {
      0% {
        background-position: 100% 0;
      }
      100% {
        background-position: -100% 0;
      }
    }
</style>
