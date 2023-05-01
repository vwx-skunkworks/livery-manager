/*
 * Copyright (c) 2023 VWX Systems
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 */

import {fileURLToPath, URL} from 'node:url'
import {defineConfig} from 'vite'

// https://vitejs.dev/config/
export default defineConfig({
    root: fileURLToPath(new URL('./web', import.meta.url)),
    publicDir: fileURLToPath(new URL('./public', import.meta.url)),
    build: {
        // generate manifest.json in outDir
        manifest: true,
        rollupOptions: {
            // overwrite default .html entry
            input: fileURLToPath(new URL('./web/main.js', import.meta.url)),
        },
    },
    resolve: {
        alias: {
            '@':        fileURLToPath(new URL('./web', import.meta.url)),
            '@public':  fileURLToPath(new URL('./public', import.meta.url)),
            '@assets':  fileURLToPath(new URL('./public/assets', import.meta.url)),
            '@css':     fileURLToPath(new URL('./web/css', import.meta.url)),
            '@js':      fileURLToPath(new URL('./web/js', import.meta.url)),
            '@scripts': fileURLToPath(new URL('./web/scripts', import.meta.url)),
        }
    }
})
