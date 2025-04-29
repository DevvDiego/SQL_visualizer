import { base } from "$app/paths";

/** @type {import('./$types').PageLoad} */
export async function load({ parent, fetch, params }) {

    // Wait for parent (+layout.js) to finish processing (if redirected, +page.js wont load)
    await parent();
	
    const res = await fetch("http://localhost:80"+ base +"/backend/api/app.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        credentials: "include" // Necesario para cookies de sesión
    });

    const res_body = await res.json();
    // console.log(res_body);
    return res_body;
    
}