<script>
let data = $state(null);

function fetchCiudadanos(){
        fetch("http://localhost/www/sveltecrud/backend/test.php")
        .then(response => {
            return response.json();
        })
        .then(json => {
            console.log("datos de tabla cargados");
            data = json;
        })

    }


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
        padding: 20px 30px;
        text-align: center;
        border-top: 1px #ffffff77 solid;
    }

    tbody tr:nth-child(odd){
        background-color: #282828;
    }

    

</style>
