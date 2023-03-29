<?php
/**
 * .
 *
 *     Flight Sim Livery Manager
 *     Copyright (c) 2023  VWX Systems
 *
 *     This program is free software: you can redistribute it and/or modify
 *     it under the terms of the GNU Lesser General Public License as published by
 *     the Free Software Foundation, either version 3 of the License, or any later version.
 *
 *     This program is distributed in the hope that it will be useful,
 *     but WITHOUT ANY WARRANTY; without even the implied warranty of
 *     MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *     GNU General Public License for more details.
 */

declare(strict_types=1);

// Dev environment

use Monolog\Level;

return static function (array $settings): array {
    // Error reporting
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');

    $settings['error']['display_error_details'] = true;
    $settings['logger']['level'] = Level::Debug;

    return $settings;
};
