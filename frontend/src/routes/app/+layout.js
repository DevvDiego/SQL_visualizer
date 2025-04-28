import { error, redirect } from '@sveltejs/kit';
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

	let res_body = await res.json();
	
	if (res.ok) {
		return{
			user:{
				'authenticated':res_body.authenticated,
				'user_id': res_body.user_id,
				'username': res_body.username
			}
		}

	} else {
		return{
			user:{
				'authenticated':res_body.authenticated,
				'message':res_body.message
			}
		}
		
	}
}