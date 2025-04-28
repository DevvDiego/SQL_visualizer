<script>

    import { base } from "$app/paths";

</script>


<main class="p-5 " >

    <h1 class="text-2xl font-bold">
        home
    </h1>
    
    <ul class="flex justify-center gap-5">

        <li>    
            <a class="block bg-zinc-500" href={base+"/auth/register"}>
                <h1 class="">register</h1>
            </a>        
        </li>

        <li>        
            <a class="block bg-zinc-500" href={base+"/auth/login"}>
                <h1>login</h1>
            </a>
        </li>

        <li>            
            <a class="block bg-zinc-500" href={base+"/auth/logout"}>
                <h1>logout</h1>
            </a>
        </li>

        <li>            
            <a class="block bg-red-500 text-white" href={base+"/app"}>
                <h1>App</h1>
            </a>
        </li>

    </ul>
        
</main>


<style>
    a{
        padding: 10px;
    }
</style>