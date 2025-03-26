<script>
    import Button from "../lib/components/Button.svelte";
    import Form from "../lib/components/Form.svelte";
    import Input from "../lib/components/Input.svelte";
    import Nav from "../lib/components/Nav.svelte";
    import Table from "../lib/components/Table.svelte";
    import Tab from "../lib/components/TabViewer/Tab.svelte";
    import TabViewer from "../lib/components/TabViewer/TabViewer.svelte";

    let refreshTableCiudadanos = $state(false);
</script>



<Nav/>



<main>

    <!-- <section class="showcase">
        
        <Form bind:refresh={refreshTableCiudadanos}>
            <Input title="Nombre" name="nombre" placeholder="..."/>
            <Input title="Edad" name="edad" placeholder="..."/>
            <Input title="Ciudad" name="ciudad" placeholder="..."/>
            <Button type="submit"/>
        </Form> 

                
       <Table bind:refresh={refreshTableCiudadanos} 
            title="Ciudadanos" queryTo={"ciudadano"} 
        /> 

    </section> -->

    <TabViewer>
        {#snippet tabs()}
            <Tab title="Insertar"/>
            <Tab title="Eliminar"/>
            <Tab title="Actualizar"/>
        {/snippet}
        
         
        <Table bind:refresh={refreshTableCiudadanos} 
            title="Ciudadanos" queryTo={"ciudadano"} 
        /> 
    </TabViewer>


</main>



<style>

</style>