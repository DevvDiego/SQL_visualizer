import { redirect } from '@sveltejs/kit';
import { base } from "$app/paths";

/** @type {import('./$types').PageLoad} */
export async function load({ fetch ,params }) {
	
	const res = await fetch("http://localhost:80"+ base +"/backend/auth/check_session.php", {
		method: "POST",
		headers: {
			"Content-Type": "application/json"
		},
		credentials: "include" // Necesario para cookies de sesión
	});
	
	if (!res.ok) {
		throw redirect(303, base+"/auth/login");
	}
}