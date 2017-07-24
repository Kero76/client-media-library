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
    declare(strict_types=1);
    
    // Home page : "/".
    $app->get('/', 'MediaClient\Controller\HomeController::home')->bind('home');
    
    // Get all specific media : "media/{media}/"
    $app->get('/media/{media}/', 'MediaClient\Controller\HomeController::getAllMedia')->bind('media-list');
    
    // Get precise media : "/media/{media}/{id}".
    $app->get('/media/{media}/{id}', 'MediaClient\Controller\HomeController::getMedia')->bind('media');
    
    // Search media : "/search/".
    $app->match('/search/', 'MediaClient\Controller\HomeController::search')->bind('search-result');
