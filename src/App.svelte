<script>
    import Button from "./lib/components/Button.svelte";
    import Input from "./lib/components/Input.svelte";
    import Nav from "./lib/components/Nav.svelte";
    import Table from "./lib/components/Table.svelte";


    
</script>



<Nav/>




<main>

    <section class="showcase">

        
    <!-- ! USE FETCH for a no reload sending form -->

<!-- 

        <form action="../backend/dbconn.php" method="post">
            <Input title="Nombre" name="nombre" placeholder="..."/>
            <Input title="Edad" name="edad" placeholder="..."/>
            <Input title="Ciudad" name="ciudad" placeholder="..."/>
            <Button type="submit" />
        </form> -->
        
        <!-- <button onclick={fetchCiudadanos}>Fetch db</button> -->
        
        <Table caption="Ciudadanos" queryTo={"ciudadano"} />

    </section>

</main>



<style>
    .showcase{
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        gap: 20px;

        padding: 20px 10px;


    }

</style>
