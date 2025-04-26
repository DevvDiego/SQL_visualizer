import adapter from '@sveltejs/adapter-static';

export default {
	kit: {
		adapter: adapter({
			pages: '../public',
			assets: '../public',
			fallback: "404.html",
		
		}),

		paths: {
			// dev
			base: "/www/tradex/public"

			// prod
			// base: ""

		}
	}
};