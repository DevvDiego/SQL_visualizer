<script>
	import '../app.css';
	
	let { children } = $props();
</script>


<main class="w-dvw h-dvh bg-zinc-900 text-zinc-50">
	{@render children()}
</main>
