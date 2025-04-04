<script>
    import Table from "../lib/components/Table.svelte";

</script>



<main>
    
    <Table title="departamentos" queryTo="departamentos" />
    <Table title="cursos" queryTo="cursos" />
    <Table title="profesores" queryTo="profesores" />

</main>



<style>
    main{
        display: flex;
        flex-direction: column;
        flex-wrap: nowrap;
        justify-content: center;
        align-items: center;
    }
</style>