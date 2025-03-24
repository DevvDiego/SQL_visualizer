<script>
    import Button from "./lib/components/Button.svelte";
    import Input from "./lib/components/Input.svelte";
    import Nav from "./lib/components/Nav.svelte";
    import Table from "./lib/components/Table.svelte";

    
</script>



<Nav/>




<main>

    <section class="showcase">
    
        <form action="" method="post">
            <Input title="Nombre" name="nombre" placeholder="..."/>
            <Input title="Edad" name="edad" placeholder="..."/>
            <Input title="Ciudad" name="ciudad" placeholder="..."/>
            <Button type="submit" />
        </form>
        
        <Table caption="Test"/>

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
