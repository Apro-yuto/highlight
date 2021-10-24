import { defineConfig } from 'laravel-vite'
import react from '@vitejs/plugin-react-refresh'

export default defineConfig()
  .withPlugin(react)
	.merge({
		// Your own Vite options
	})
