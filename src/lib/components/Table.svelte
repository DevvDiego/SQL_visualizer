<script>
    import { onMount } from "svelte";

    let data = $state(null);

    function getData(queryTo){
        fetch("http://localhost/www/sveltecrud/backend/test.php?queryTo="+queryTo)
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
                <th></th>
                <th></th>
                <th></th>
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
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
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

    

</style>
