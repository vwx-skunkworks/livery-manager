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
import 'vite/modulepreload-polyfill'
import '@/css/main.css'
import * as bootstrap from '@bootstrap'
import '@bootstrap/scss/bootstrap.scss'
import '@scripts/themeset.js'


document.addEventListener("DOMContentLoaded", function(event) {
    const activeLink = document.querySelector('#topnavigationbar a[href^="/' + location.pathname.split("/")[1] + '"]');
    activeLink.className += ' active';
});
