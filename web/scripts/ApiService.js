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

import http from '@scripts/http'

class ApiService {
    getAll(item) {
        return http.get(`/${item}`);
    }

    get(item, id) {
        return http.get(`/${item}/${id}`);
    }

    create(item, data) {
        return http.post(`/${item}`, data);
    }

    update(item, id, data) {
        return http.put(`/${item}/${id}`, data);
    }

    delete(item, id) {
        return http.delete(`/${item}/${id}`)
    }
}

export default new ApiService();
