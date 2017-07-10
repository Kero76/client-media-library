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
    // Home page.
    $app->get('/', function() use ($app) {
        // All uri used in Media Library to get all medias.
        $uri = array(
            'animes/', 'cartoons/', 'movies/', 'series/', 'musics/', 'books', 'comics', 'video-games',
        );
        $medias = array();
        
        $uriSize = count($uri);
        for ($i = 0; $i < $uriSize; ++$i) {
            $medias = array_merge($medias, $app['rest']->get($uri[$i]));
        }
        
        return $medias;
    });
