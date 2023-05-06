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

import ApiService from '@scripts/ApiService'


const newLiveryForm = document.getElementById('newliveryform');
newLiveryForm.addEventListener('submit', newLivery);


function newLivery(event) {
    const formData = new FormData(newLiveryForm);

    console.log(JSON.stringify(Object.fromEntries(formData)));
    ApiService.create('livery', JSON.stringify(Object.fromEntries(formData))).then(function () {
        location.reload();
    })
    event.preventDefault();
}

function populateSelects() {
    const airframeSelect = document.getElementById('airframe_id');
    const liveryTypeSelect = document.getElementById('livery_type_id');

    ApiService.getAll('airframe').then(function (response) {
        for (const row of response.data.data) {
            let opt = document.createElement('option');
            opt.value = row.id;

            opt.text =  row.developer.name + ' - ' + row.name + ' - ' + row.simulator.name;
            airframeSelect.appendChild(opt);
        }
    });

    ApiService.getAll('liverytype').then(function (response) {
        for (const row of response.data.data) {
            let opt = document.createElement('option');
            opt.value = row.id;
            opt.text = row.name;
            liveryTypeSelect.appendChild(opt);
        }
    });
}

populateSelects();
