<script>
    let { title = "Tab" } = $props();
</script>

<button>
    {title}
</button>

<style>
    button{
        font-size: 1rem;
        font-weight: normal;

        background-color: #151515;
        color: #ffffffde;

        border: none;
        padding: 10px 15px;

    }
</style>