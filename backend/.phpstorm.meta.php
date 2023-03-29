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

namespace PHPSTORM_META;

override(\Psr\Container\ContainerInterface::get(0), map(['' => '@']));
override(
    \Symfony\Component\Cache\Adapter\FilesystemAdapter::getItem(),
    type(\Psr\Cache\CacheItemPoolInterface::class)
);
