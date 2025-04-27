<script>
    import { base } from "$app/paths";
    
    let error = $state("");

    /**
     * 
     * @param {SubmitEvent} ev
     */
    async function handleForm(ev) {
        ev.preventDefault();
        const formdata = new FormData(ev.target);

        const res = await fetch("http://localhost:80"+ base +"/backend/auth/login.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({
                "username": formdata.get("username"),
                "password": formdata.get("password")
            }),
            credentials: "include" // Necesario para cookies de sesión
        });

        if (res.ok) {
            // window.location.href = {base}+"/login";
            console.log(res.json())
        } else {
            error = await res.text();
        }
    }


</script>


<form class="p-5" onsubmit={handleForm}>

    <h1 class="text-xl">
        LOGIN
    </h1>

    <label for="username">username</label>
    <input type="text" name="username" id="username">
    
    <label for="password">password</label>
    <input type="text" name="password" id="password">

    <button type="submit" class="w-20 h-12 hover:bg-amber-300 active:bg-amber-600">
        enviar
    </button>

</form>