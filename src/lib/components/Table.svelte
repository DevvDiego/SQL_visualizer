<script>
    import { onMount } from "svelte";

    let data = $state(null);

    function getData(queryTo){
        fetch("http://localhost/www/sveltecrud/backend/select.php?queryTo="+queryTo)
        .then(response => {
            return response.json();
        })
        .then(json => {
            console.log("datos de tabla cargados");
            data = json;
        })

    }

    onMount(()=>{
        //send Table.svelte propr "queryTo"
        getData(queryTo); 
    })

    let { caption, queryTo } = $props();
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
    }

    table caption{
        background-color: #151515;
        border-top-left-radius: 20px;
        border-top-right-radius: 20px;

        font-size: 1.3rem;
        font-weight: bold;
        padding: 10px;
    }

    th, td{
        padding: 15px 20px;
        text-align: center;
        border-top: 1px #ffffff77 solid;
    }

    tbody tr:nth-child(odd){
        background-color: #282828;
    }
    
    /* Estilo base para el contenedor de carga */
    .skeleton {
        width: 100%;
        height: 1.5em;
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
