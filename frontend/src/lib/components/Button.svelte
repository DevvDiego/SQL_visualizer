<script>

let { type, text="Submit" } = $props();
</script>


<button {type}>
    {text}
</button>



<style>
    button{
        color: inherit;
        border: none;

        font-weight: bold;
        background-color: #151515;
        box-shadow: 0px 5px 10px #282828;

        width: 80%;
        border-radius: 15px;

        display: block;
        margin: 0px auto;
        padding: 10px;
    }
</style>