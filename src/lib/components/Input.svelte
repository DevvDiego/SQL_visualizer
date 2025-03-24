<script>

let { title, placeholder="...", name, id="" } = $props();
</script>




<div>
    <span>{title}</span>
    <input type="text" {name} {id} {placeholder}>
</div>




<style>

    div{
        display: flex;
        flex-direction: column;
        flex-wrap: nowrap;
        gap: 5px;

        margin-bottom: 15px;

        font-size: 0.9rem;
        font-weight: bolder;
        letter-spacing: 0.5px;
    }

    input{
        color: inherit;
        border: none;

        font-weight: bold;
        background-color: #151515;
        box-shadow: 0px 5px 10px #282828;

        padding: 10px;

    }
</style>