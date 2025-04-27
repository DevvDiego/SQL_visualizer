import { error } from '@sveltejs/kit';
import { base } from "$app/paths";

/** @type {import('./$types').PageLoad} */
export async function load({ params }) {
	
	const res = await fetch("http://localhost:80"+ base +"/backend/api/app.php", {
		method: "POST",
		headers: {
			"Content-Type": "application/json"
		},
		credentials: "include" // Necesario para cookies de sesión
	});

	if (res.ok) {
		let res_body = res.json();

		return{
			user: {
				authenticated:res_body,
			}
		}

	} else {
		console.log("ERROR?")
		console.log(res.text());
		
		return{
			user: {
				authenticated:false,
			}
		}
	}
}