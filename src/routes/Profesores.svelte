<script>
    import Button from "../lib/components/Button.svelte";
    import Form from "../lib/components/Form.svelte";
    import Input from "../lib/components/Input.svelte";
    import Table from "../lib/components/Table.svelte";
    import TabViewer from "../lib/components/TabViewer.svelte";

    let refreshTable = $state(false);

    let target = "profesores";

</script>

<!-- TODO convertir esta pagina a un componente para simplificar -->
<!-- TODO agregar estilos que hagan parecer verdaderamente un solo form por pagina -->





{#snippet insertarContent()}

    <Form {target} action={"insert"} bind:refreshTable>
        <Input title="Nombre" name="nombre" placeholder="..."/>
        <Button type="submit"/>
    </Form> 

{/snippet}

{#snippet eliminarContent()}

    <Form {target} action={"delete"} bind:refreshTable>
        <Input title="Nombre" name="nombre" placeholder="..." />
        <Button type="submit"/>
    </Form> 

{/snippet}

{#snippet actualizarContent()}

    <Form {target} action={"update"} bind:refreshTable>
        <Input title="Identificador" name="id" placeholder="..." />
        <Input title="Nombre" name="id" placeholder="..." />
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

    <Table bind:refreshTable
        title="Profesores" queryTo={"profesores"} 
    />

</TabViewer>



<style>

</style>