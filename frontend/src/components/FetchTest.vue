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
    <template v-for="endpoint in endpoints">
        <input type="radio"
               :id="endpoint"
               :value="endpoint"
               name="endpoint"
               v-model="currentEndpoint">
        <label :for="endpoint">{{ endpoint }}</label>
    </template>
    <p>Current Endpoint: {{ currentEndpoint }}</p>
    <ul>
        <li v-for="{ id, name, created_at } in apiResp">
            <span>{{ id }}</span>
            - <span>{{ name }}</span>
            <span>({{ created_at }})</span>
        </li>
    </ul>
</template>

<script setup>
import {ref, watchEffect} from 'vue'

const API_URL = `http://localhost:8080/api`
const endpoints = ['simulator', 'operation']
const currentEndpoint = ref(endpoints[0])
const apiResp = ref(null)

watchEffect(async () => {
    const url = `${API_URL}/${currentEndpoint.value}`
    apiResp.value = (await (await fetch(url)).json()).data
})
</script>

<style scoped>

</style>
