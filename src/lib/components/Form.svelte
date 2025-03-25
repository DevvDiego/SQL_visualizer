<script>

    function handleForm(e){
        e.preventDefault();
        refresh = true;
    }


    let { refresh = $bindable(), children } = $props();
</script>


<form onsubmit={handleForm}>
    {@render children()}
</form>