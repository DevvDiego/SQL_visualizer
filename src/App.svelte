<script>
    import Button from "./lib/components/Button.svelte";
    import Form from "./lib/components/Form.svelte";
    import Input from "./lib/components/Input.svelte";
    import Nav from "./lib/components/Nav.svelte";
    import Table from "./lib/components/Table.svelte";
    

    let refreshTableCiudadanos = $state(false);
</script>



<Nav/>




<main>

    <section class="showcase">

        
    <!-- ! USE FETCH for a no reload sending form -->



        <Form bind:refresh={refreshTableCiudadanos}>
            <Input title="Nombre" name="nombre" placeholder="..."/>
            <Input title="Edad" name="edad" placeholder="..."/>
            <Input title="Ciudad" name="ciudad" placeholder="..."/>
            <!-- <Button type="submit" /> -->
            <button type="submit">submit</button>
        </Form>
                
        <Table bind:refresh={refreshTableCiudadanos} caption="Ciudadanos" queryTo={"ciudadano"} />

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
