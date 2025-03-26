<script>
    import Button from "../lib/components/Button.svelte";
    import Form from "../lib/components/Form.svelte";
    import Input from "../lib/components/Input.svelte";
    import Table from "../lib/components/Table.svelte";
    import TabViewer from "../lib/components/TabViewer.svelte";

    let refreshTableCiudadanos = $state(false);
</script>

<!-- TODO convertir esta pagina a un componente para simplificar -->
<!-- TODO agregar estilos que hagan parecer verdaderamente un solo form por pagina -->



{#snippet insertarContent()}

    <Form bind:refresh={refreshTableCiudadanos}>
        <Input title="Nombre" name="nombre" placeholder="..."/>
        <Input title="Edad" name="edad" placeholder="..."/>
        <Input title="Ciudad" name="ciudad" placeholder="..."/>
        <Button type="submit"/>
    </Form> 

{/snippet}

{#snippet eliminarContent()}

    <Form bind:refresh={refreshTableCiudadanos}>
        <h2>Eliminar</h2>
        <Button type="submit"/>
    </Form> 

{/snippet}

{#snippet actualizarContent()}

    <Form bind:refresh={refreshTableCiudadanos}>
        <h2>Actualizar</h2>
        <Button type="submit"/>
    </Form>

{/snippet}


<TabViewer tabs={
[
    { title: "Insertar", content: [insertarContent] },
    { title: "Eliminar", content: [eliminarContent] },
    { title: "Actualizar", content: [actualizarContent] }
]}
>

    <Table bind:refresh={refreshTableCiudadanos} 
        title="Ciudadanos" queryTo={"ciudadano"} 
    />

</TabViewer>



<style>

</style>