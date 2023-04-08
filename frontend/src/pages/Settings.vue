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
    <nav class="navbar navbar-expand-md justify-content-center justify-content-md-start leftmenu order-first p-2 me-md-2 bg-body-tertiary rounded-3 shadow">
        <button class="navbar-toggler border-0 w-100 h-auto" type="button" data-bs-toggle="collapse" data-bs-target="#leftNavBar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="leftNavBar">
            <ul class="nav nav-pills flex-column">
                <li class="nav-item">
                    <a href="#" class="nav-link">Site Settings</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Simulators</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Operation Types</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Airframe Developers</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Airframes</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Livery Types</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Liveries</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="order-last flex-shrink-0 flex-grow-1 mt-3 mt-md-0 px-1 px-md-2">
        <h2>Site Settings</h2>
    </div>
</template>

<script setup>

</script>

<style scoped>
nav.leftmenu {
    min-width: 175px;
}
</style>
