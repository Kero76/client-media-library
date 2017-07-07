<?php
/*
 * This file is part of Media-Client.
 *
 * Media-Client is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Media-Client is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Media-Library. If not, see <http://www.gnu.org/licenses/>.
 */
    require_once __DIR__ . '/../vendor/autoload.php';
    require_once __DIR__. '/../app/routes.php';

    // Create instance of Application
    $app = new Silex\Application();
    
    // To help app debugging
    $app['debug'] = true;
    
    // Run the application.
    $app->run();
