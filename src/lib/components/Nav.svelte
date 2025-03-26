<script>
let { children } = $props();
</script>



<nav>        
    {@render children?.()}
</nav>



<style>

    nav{
        background-color: #1c1c1c;
        padding: 15px 25px;
        
    }

</style>