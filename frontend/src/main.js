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
import 'bootstrap/scss/bootstrap.scss'
import './assets/main.css'

import {createApp} from 'vue'
import {createPinia} from 'pinia';
import {createRouter, createWebHistory} from 'vue-router'
import '@popperjs/core'
import 'bootstrap/dist/js/bootstrap.bundle.js'
import '@/scripts/themeset.js'
import App from '@/App.vue'
import HomePage from '@/pages/Home.vue'
import StoragePage from '@/pages/Storage.vue'
import FaqPage from '@/pages/Faq.vue'
import SettingsPage from '@/pages/Settings.vue'

const routes = [
    { path: '/', component: HomePage },
    { path: '/storage', component: StoragePage },
    { path: '/faq', component: FaqPage },
    { path: '/settings', component: SettingsPage },
]

const router = createRouter({
    history: createWebHistory(),
    linkActiveClass: "link-body-emphasis",
    linkExactActiveClass: "link-body-emphasis",
    routes
})

const pinia = createPinia()
const app = createApp(App)
app.use(pinia)
app.use(router)
app.mount('#app');
