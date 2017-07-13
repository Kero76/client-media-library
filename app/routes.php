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

// Home page.
    use MediaClient\Model\Video\Anime;
    
    $app->get('/', function() use ($app) {
    // Instantiate uri, medias array's and count element on uri array.
    $uri     = array('animes/', /*'cartoons/', 'movies/', 'series/', 'musics/', 'books/', 'comics/', 'video-games/'*/);
    $media  = array();
    $uri_size = count($uri);
    
    // Loop on each uri and get all medias.
    for ($i = 0; $i < $uri_size; ++$i) {
        $media_request = $app['rest']->get($uri[$i]); // Get all specific media.
        $media_object = array();
        foreach ($media_request as $k) {
            $id = $k['id'];
            $media_object[$id] = new Anime($k);
        }
            
        $media = array_merge($media, $media_object);
    }
    
    // Return all medias.
    return $app['twig']->render('home.html.twig', array('medias' => $media));
});
