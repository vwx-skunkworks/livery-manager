<!--
  - Copyright (c) 2023 VWX Systems
  - This program is free software: you can redistribute it and/or modify
  - it under the terms of the GNU Lesser General Public License as published by
  - the Free Software Foundation, either version 3 of the License, or any later version.
  -
  - This program is distributed in the hope that it will be useful,
  - but WITHOUT ANY WARRANTY; without even the implied warranty of
  - MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  - GNU General Public License for more details.
  -->

<template>
    <header class="d-flex flex-row flex-wrap justify-content-center justify-content-md-between pt-3 mb-4 border-bottom">
        <div class="mb-0 mb-md-2 px-3">
            <router-link to="/" class="d-inline-flex link-body-emphasis text-decoration-none">
                <AircraftNorth />
                <span id="navtitle" class="fs-3">Livery Manager</span>
            </router-link>
        </div>
        <ul class="nav nav-underline flex-fill justify-content-center justify-content-md-end nav mb-0 mb-md-2 px-3">
            <li class="nav-item"><router-link to="/" class="nav-link px-2">Home</router-link></li>
            <li class="nav-item"><router-link to="/storage" class="nav-link px-2">Storage</router-link></li>
            <li class="nav-item"><router-link to="/faq" class="nav-link px-2">FAQ</router-link></li>
            <li class="nav-item"><router-link to="/settings" class="nav-link px-2">Settings</router-link></li>
        </ul>
    </header>
</template>

<script setup>
import AircraftNorth from './icons/AircraftNorth.vue'
</script>

<style scoped>
#navtitle {
    font-family: 'Keypunch029Bold';
    font-weight: bold;
}

.router-link-active {

}
</style>
