<script>
    import Nav from "../lib/components/Nav.svelte";
    import Table from "../lib/components/Table.svelte";
    import TabViewer from "../lib/components/TabViewer.svelte";

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
    {#snippet insertarContent()}
    
        <Table bind:refresh={refreshTableCiudadanos} 
            title="Ciudadanos" queryTo={"ciudadano"} 
        />
    
    {/snippet}
    
    {#snippet eliminarContent()}
        <div>
        <h2>Eliminar</h2>
        <p>Contenido para el tab Eliminar.</p>
        </div>
    {/snippet}
    
    {#snippet actualizarContent()}
        <div>
        <h2>Actualizar</h2>
        <p>Contenido para el tab Actualizar.</p>
        </div>
    {/snippet}

    
    <TabViewer tabs={
        [
            { title: "Insertar", content: [insertarContent] },
            { title: "Eliminar", content: [eliminarContent] },
            { title: "Actualizar", content: [actualizarContent] }
        ]}
    ></TabViewer>


</main>



<style>

</style>