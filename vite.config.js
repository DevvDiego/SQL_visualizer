import { defineConfig } from 'vite'
import { svelte } from '@sveltejs/vite-plugin-svelte'
// import path from "path"

// https://vite.dev/config/
export default defineConfig({
  plugins: [svelte()],
  build: {
    outDir: "frontend"
  },
  // resolve: {
  //   alias: {
  //     "@": path.resolve(__dirname,"public"),
  //     "$lib": path.resolve(__dirname,"src/lib"),
  //   }
  // }
})
