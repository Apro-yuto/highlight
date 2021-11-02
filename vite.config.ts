import path from 'path'
import 'react'
import { defineConfig } from 'laravel-vite'
import react from '@vitejs/plugin-react-refresh'

export default defineConfig()
  .withPlugin(react)
	.merge({
		// Your own Vite options
		resolve: {
			alias: {
				'@': path.resolve(__dirname, '/resources')
			}
		}
	})
