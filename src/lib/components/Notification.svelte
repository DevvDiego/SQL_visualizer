<script>


    let {status, message} = $props();
</script>

<div class={status=="ok"? "successful":"error" }>
    <h1>{status}</h1>
    <p>
        {message}
    </p>
</div>


<style>
    .successful{
        background-color: rgb(30, 68, 30);
    }

    .error{
        background-color: rgb(79, 27, 27);
    }

    div{
        width: 95%;
        height: 10%;
        padding: 15px;
        margin: 20px auto;
        
    }

    h1{
        font-size: 18px;
        font-weight: bolder;
        margin-bottom: 5px;
    }

    p{
        word-wrap: break-word;
        font-size: 14px;
        line-height: 1.5;
    }
</style>