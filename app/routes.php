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
     * along with Media-Client. If not, see <http://www.gnu.org/licenses/>.
     */
    declare(strict_types=1);
    
    // Home page : "/".
    $app->match('/', 'MediaClient\Controller\HomeController::homeAction')->bind('home');
    
    // Get all specific media : "media/{media}/"
    $app->get('/media/{media}/', 'MediaClient\Controller\HomeController::mediasAction')->bind('media-list');
    
    // Get precise media : "/media/{media}/{id}".
    $app->get('/media/{media}/{id}', 'MediaClient\Controller\HomeController::mediaAction')->bind('media');
    
    // Search media : "/search/".
    $app->match('/search/', 'MediaClient\Controller\HomeController::searchAction')->bind('search-result');
    
    // Registration page : "/register/".
    $app->match('/register/', 'MediaClient\Controller\HomeController::registerAction')->bind('register');
    
    // Login page : "/login/".
    $app->match('/login/', 'MediaClient\Controller\HomeController::loginAction')->bind('login');
    
    // Admin page : "/admin/".
    $app->get('/admin/', 'MediaClient\Controller\AdminController::homeAction')->bind('admin');
    
    // Admin page : "/admin/add-media/{media}/".
    $app->match('/admin/add-media/{media}/', 'MediaClient\Controller\AdminController::addMediaAction')->bind('add-media');
    
    // Admin page : "/admin/edit-media/{media}/{id}".
    $app->match('/admin/edit-media/{media}/{id}/', 'MediaClient\Controller\AdminController::updateMediaAction')->bind('edit-media');
    
    // Admin page : "/admin/".
    $app->get('/admin/delete-media/{media}/{id}/', 'MediaClient\Controller\AdminController::deleteMediaAction')->bind('remove-media');
