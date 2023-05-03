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

import DataTables from 'datatables.net-bs5'
import ApiService from '@scripts/ApiService'

let simtable = new DataTables('#simulatorstable', {
    ajax: {
        url: '/api/simulator',
        dataSrc: 'data'
    },
    columns: [
        { data: 'name' },
        { data: 'created_at' }
    ]
});

let devtable = new DataTables('#developerstable', {
    ajax: {
        url: '/api/developer',
        dataSrc: 'data'
    },
    columns: [
        { data: 'name' },
        { data: 'created_at' }
    ]
});

let frametable = new DataTables('#airframestable', {
    ajax: {
        url: '/api/airframe',
        dataSrc: 'data'
    },
    columns: [
        { data: 'operation.name' },
        { data: 'simulator.name' },
        { data: 'developer.name' },
        { data: 'name' },
        { data: 'icao' },
        { data: 'created_at' },
    ]
});

let typestable = new DataTables('#liverytypestable', {
    ajax: {
        url: '/api/liverytype',
        dataSrc: 'data'
    },
    columns: [
        { data: 'name' },
        { data: 'description' },
        { data: 'created_at' }
    ]
});

const newSimForm = document.getElementById('newsimform');
newSimForm.addEventListener('submit', newSimulator);
const newDevForm = document.getElementById('newdevform');
newDevForm.addEventListener('submit', newDeveloper);
const newAirframeForm = document.getElementById('newairframeform');
newAirframeForm.addEventListener('submit', newAirframe);
const newLiveryTypeForm = document.getElementById('newliverytypeform');
newLiveryTypeForm.addEventListener('submit', newLiveryType);


function newSimulator(event) {
    const formData = new FormData(newSimForm);
    ApiService.create('simulator', JSON.stringify(Object.fromEntries(formData))).then(function () {
        document.querySelector('#newsimform #name').value = '';
        simtable.ajax.reload();
    });
    event.preventDefault();
}
function newDeveloper(event) {
    const formData = new FormData(newDevForm);
    ApiService.create('developer', JSON.stringify(Object.fromEntries(formData))).then(function () {
        document.querySelector('#newdevform #name').value = '';
        devtable.ajax.reload();
    });
    event.preventDefault();
}
function newAirframe(event) {
    const formData = new FormData(newAirframeForm);
    console.log(JSON.stringify(Object.fromEntries(formData)));
    ApiService.create('airframe', JSON.stringify(Object.fromEntries(formData))).then(function () {
        document.querySelector('#newairframeform #name').value = '';
        document.querySelector('#newairframeform #icao').value = '';
        document.querySelector('#newairframeform #description').value = '';
        frametable.ajax.reload();
    });
    event.preventDefault();

}
function newLiveryType(event) {
    const formData = new FormData(newLiveryTypeForm);
    ApiService.create('liverytype', JSON.stringify(Object.fromEntries(formData))).then(function () {
        document.querySelector('#newliverytypeform #name').value = '';
        document.querySelector('#newliverytypeform #description').value = '';
        typestable.ajax.reload();
    });
    event.preventDefault();
}

function populateAirframeSelect() {
    const operationSelect = document.getElementById('operation_id');
    const simSelect = document.getElementById('simulator_id');
    const developerSelect = document.getElementById('developer_id');

    ApiService.getAll('operation').then(function (response) {
        for (const row of response.data.data) {
            let opt = document.createElement('option');
            opt.value = row.id;
            opt.text = row.name;
            operationSelect.appendChild(opt);
        }
    });

    ApiService.getAll('simulator').then(function (response) {
        for (const row of response.data.data) {
            let opt = document.createElement('option');
            opt.value = row.id;
            opt.text = row.name;
            simSelect.appendChild(opt);
        }
    });

    ApiService.getAll('developer').then(function (response) {
        for (const row of response.data.data) {
            let opt = document.createElement('option');
            opt.value = row.id;
            opt.text = row.name;
            developerSelect.appendChild(opt);
        }
    });
}
populateAirframeSelect();
