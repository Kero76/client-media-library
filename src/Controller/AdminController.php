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
    
    namespace MediaClient\Controller;
    use MediaClient\Form\Search\SearchEntity;
    use MediaClient\Form\Search\SearchType;
    use MediaClient\Model\Book\Book;
    use MediaClient\Model\Book\Comic;
    use MediaClient\Model\Game\VideoGame;
    use MediaClient\Model\Music\Album;
    use MediaClient\Model\Video\Anime;
    use MediaClient\Model\Video\Cartoon;
    use MediaClient\Model\Video\Movie;
    use MediaClient\Model\Video\Series;
    use Silex\Application;
    use Symfony\Component\HttpFoundation\Request;

    /**
     * Class AdminController
     *
     * @author Nicolas GILLE
     * @package MediaClient\Controller
     * @since 1.0
     * @version 1.0
     */
    class AdminController {
        
        /**
         * Get home app.
         *
         * @param \Silex\Application $app
         *  Silex Application
         * @return mixed
         *  Twig renderer web page.
         * @since 1.0
         * @version 1.0
         */
        public function homeAction(Application $app) {
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
        
            // Form builder.
            $search_form = $app['form.factory']->create(SearchType::class, new SearchEntity());
            $search_form_view = $search_form->createView();
        
            // Return all medias.
            return $app['twig']->render('admin/home.html.twig', array(
                'animes'   => $animes,
                'cartoons' => $cartoons,
                'movies'   => $movies,
                'series'   => $series,
                'musics'   => $musics,
                'books'    => $books,
                'comics'   => $comics,
                'video_games' => $video_games,
                'search_form' => $search_form_view,
            ));
        }
        
        
        public function addMediaAction(Application $app, Request $request, string $media) {
            // Form builder.
            $search_form = $app['form.factory']->create(SearchType::class, new SearchEntity());
            $search_form_view = $search_form->createView();
            
            // Return all medias.
            return $app['twig']->render('admin/home.html.twig', array(
                'search_form' => $search_form_view,
            ));
        }
        
        public function updateMediaAction(Application $app, Request $request, int $id, string $media) {
            // Form builder.
            $search_form = $app['form.factory']->create(SearchType::class, new SearchEntity());
            $search_form_view = $search_form->createView();
            
            // Return all medias.
            return $app['twig']->render('admin/home.html.twig', array(
                'search_form' => $search_form_view,
            ));
        }
    
        /**
         * Delete a precise media.
         *
         * @param \Silex\Application $app
         *  Silex app.
         * @param int $id
         *  Identifier of media at delete.
         * @param string $media
         *  Media at delete.
         * @return string
         *  Redirect the user into home admin.
         * @since 1.0
         * @version 1.0
         */
        public function deleteMediaAction(Application $app, int $id, string $media) {
            $app['rest']->delete($media . '/' . $id);
            return $app->redirect($app['url_generator']->generate('admin'));
        }
    }
