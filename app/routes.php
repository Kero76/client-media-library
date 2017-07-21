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
    
    use MediaClient\Http\HttpCodeStatus;
    use MediaClient\Model\Book\Comic;
    use MediaClient\Model\Game\VideoGame;
    use MediaClient\Model\Music\Album;
    use MediaClient\Model\Video\Anime;
    use MediaClient\Model\Video\Cartoon;
    use MediaClient\Model\Video\Movie;
    use MediaClient\Model\Video\Series;

// Home page : "/".
$app->get('/', function() use ($app) {
    // Instantiate uri, medias array's and count element on uri array.
    $uri      = array('animes/', 'cartoons/', 'movies/', 'series/', 'musics/', /*'books/', 'comics/', 'video-games/'*/);
    $uri_size = count($uri);
    $animes   = array();
    $cartoons = array();
    $movies   = array();
    $series   = array();
    $musics   = array();
    $books    = array();
    $comics   = array();
    $video_games = array();
    
    // Loop on each uri and get all medias.
    for ($i = 0; $i < $uri_size; ++$i) {
        $media_request = $app['rest']->get($uri[$i]); // Get all specific media.
                
        // Switch to generate right object.
        switch ($i) {
            // Anime
            case 0 :
                foreach ($media_request as $k) {
                    $id = $k['id'];
                    $animes[$id] = new Anime($k);
                }
                break;
            // Cartoons
            case 1 :
                foreach ($media_request as $k) {
                    $id = $k['id'];
                    $cartoons[$id] = new Cartoon($k);
                }
                break;
            // Movie
            case 2 :
                foreach ($media_request as $k) {
                    $id = $k['id'];
                    $movies[$id] = new Movie($k);
                }
                break;
            // Series
            case 3 :
                foreach ($media_request as $k) {
                    $id = $k['id'];
                    $series[$id] = new Series($k);
                }
                break;
            // Music
            case 4 :
                foreach ($media_request as $k) {
                    $id = $k['id'];
                    $musics[$id] = new Album($k);
                }
                break;
            // Book
            case 5 :
                foreach ($media_request as $k) {
                    $id = $k['id'];
                    $books[$id] = new Book($k);
                }
                break;
            // Comic
            case 6 :
                foreach ($media_request as $k) {
                    $id = $k['id'];
                    $comics[$id] = new Comic($k);
                }
                break;
            // VideoGame
            case 7 :
                foreach ($media_request as $k) {
                    $id = $k['id'];
                    $video_games[$id] = new VideoGame($k);
                }
                break;
        }
    }
    
    // Return all medias.
    return $app['twig']->render('home.html.twig', array(
        'animes'   => array_reverse(array_slice($animes, count($animes) - 10)),
        'cartoons' => array_reverse(array_slice($cartoons, count($cartoons) - 10)),
        'movies'   => array_reverse(array_slice($movies, count($movies) - 10)),
        'series'   => array_reverse(array_slice($series, count($series) - 10)),
        'musics'   => array_reverse(array_slice($musics, count($musics) - 10)),
        'books'    => array_reverse(array_slice($books, count($books) - 10)),
        'comics'   => array_reverse(array_slice($comics, count($comics) - 10)),
        'video_games' => array_reverse(array_slice($video_games, count($video_games) - 10)),
    ));
})->bind('home');

// Get all specific media : "media/{media}/"
$app->get('/media/{media}/', function($media) use($app) {
    $medias = $app['rest']->get($media . '/');
    
    // Check if an error occurred during HTTP request.
    if (isset($medias['code_error']) && $medias['code_error'] === HttpCodeStatus::NO_CONTENT()->getValue()) {
        $medias = array();
    }
        
    return $app['twig']->render('media-list.html.twig', array(
        'medias' => $medias,
        'media_type' => $media,
    ));
})->bind('media-list');
    
// Get precise media : "/media/{media}/{id}".
$app->get('/media/{media}/{id}', function($media, $id) use($app) {
    $media = $app['rest']->get($media . '/search/id/' . $id);
    
    // Check if an error occurred during HTTP request.
    if (isset($medias['code_error']) && $medias['code_error'] === HttpCodeStatus::NO_CONTENT()->getValue()) {
        $media = array();
    }
    
    // Problem with timestamp who contains 13 instead of 10 chars.
    // So divide it by 1000 and the timestamp become correct.
    $media['releaseDate'] = $media['releaseDate'] / 1000;
    
    if (isset($media['endDate'])) {
        $media['endDate'] = $media['endDate'] / 1000;
    }
        
    return $app['twig']->render('media.html.twig', array(
        'media' => $media,
    ));
})->bind('media');
