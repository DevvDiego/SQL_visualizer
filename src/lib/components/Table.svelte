<script>



let { caption } = $props();
</script>



<table>
    <caption>{caption}</caption>
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Edad</th>
            <th>Ciudad</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Diego</td>
            <td>25</td>
            <td>Ciudad de México</td>
        </tr>
        <tr>
            <td>Diego</td>
            <td>25</td>
            <td>Ciudad de México</td>
        </tr>
        <tr>
            <td>Elena</td>
            <td>30</td>
            <td>Guadalajara</td>
        </tr>
        <tr>
            <td>Elena</td>
            <td>30</td>
            <td>Guadalajara</td>
        </tr>
        <tr>
            <td>Elena</td>
            <td>30</td>
            <td>Guadalajara</td>
        </tr>
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
        padding: 10px 0px;
    }

    th, td{
        padding: 15px;
        text-align: center;
    }

    tbody tr:nth-child(odd){
        background-color: #282828;
    }

</style>
