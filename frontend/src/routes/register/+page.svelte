<script>
    import { base } from "$app/paths";

    let username = $state("");
    let password = $state("");
    let error = $state("");

    async function handleForm(ev) {
        ev.preventDefault();
        const res = await fetch("http://localhost:80"+ base +"/backend/auth/register.php", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ username, password }),
        });

        if (res.ok) {
            // window.location.href = {base}+"/login";
            console.log(res.json())
        } else {
            error = await res.text();
        }
    }

</script>


<form onsubmit={handleForm}>

    <label for="username">username</label>
    <input type="text" name="username" id="username">
    
    <label for="password">password</label>
    <input type="text" name="password" id="password">

    <button type="submit" class="w-20 h-12 hover:bg-amber-300 active:bg-amber-600">
        enviar
    </button>

</form>