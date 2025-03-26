<script>
let { children } = $props();
</script>



<nav>

    <ul>
        <li>
            
            {@render children()}

        </li>
    </ul>

</nav>



<style>

    nav{
        background-color: #1c1c1c;
        padding: 15px 25px;
        
    }

</style>