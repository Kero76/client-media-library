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
    
    use MediaClient\Form\Login\LoginEntity;
    use MediaClient\Form\Login\LoginType;
    use MediaClient\Form\Registration\RegistrationEntity;
    use MediaClient\Form\Registration\RegistrationType;
    use MediaClient\Form\Search\SearchEntity;
    use MediaClient\Form\Search\SearchType;
    use MediaClient\Http\HttpCodeStatus;
    use MediaClient\Model\Book\Book;
    use MediaClient\Model\Book\Comic;
    use MediaClient\Model\Game\VideoGame;
    use MediaClient\Model\Music\Album;
    use MediaClient\Model\Video\Anime;
    use MediaClient\Model\Video\Cartoon;
    use MediaClient\Model\Video\Movie;
    use MediaClient\Model\Video\Series;
    use MediaClient\User\User;
    use Silex\Application;
    use Symfony\Component\HttpFoundation\Request;

    /**
     * Class HomeController
     *
     * @author Nicolas GILLE
     * @package MediaClient\Controller
     * @since 1.0
     * @version 1.0
     */
    class HomeController {
    
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
            return $app['twig']->render('home.html.twig', array(
                'animes'   => array_reverse(array_slice($animes, count($animes) - 10)),
                'cartoons' => array_reverse(array_slice($cartoons, count($cartoons) - 10)),
                'movies'   => array_reverse(array_slice($movies, count($movies) - 10)),
                'series'   => array_reverse(array_slice($series, count($series) - 10)),
                'musics'   => array_reverse(array_slice($musics, count($musics) - 10)),
                'books'    => array_reverse(array_slice($books, count($books) - 10)),
                'comics'   => array_reverse(array_slice($comics, count($comics) - 10)),
                'video_games' => array_reverse(array_slice($video_games, count($video_games) - 10)),
                'search_form' => $search_form_view,
            ));
        }
    
        /**
         * Get all specific media.
         *
         * @param \Silex\Application $app
         *  Silex Application.
         * @param $media
         *  Media at search.
         * @param \Symfony\Component\HttpFoundation\Request $request
         *  Request use to get parameter from HTTP request.
         * @return mixed
         *  Twig renderer web page.
         * @since 1.0
         * @version 1.0
         */
        public function mediasAction(Application $app, Request $request, string $media) {
            $medias = $app['rest']->get($media . '/');
            $pagination = $request->get('pagination');
    
            // Check if an error occurred during HTTP request.
            if (isset($medias['code_error']) && $medias['code_error'] === HttpCodeStatus::NO_CONTENT()->getValue()) {
                $medias = array();
            }
    
            // Form builder.
            $search_form = $app['form.factory']->create(SearchType::class, new SearchEntity());
            $search_form_view = $search_form->createView();
    
            return $app['twig']->render('media-list.html.twig', array(
                'medias' => array_slice($medias, $pagination * 10, 10),
                'media_type' => $media,
                'search_form' => $search_form_view,
                'pagination' => array(
                    'active' => $pagination,
                    'size' => floor(count($medias) / 10),
                ),
            ));
        }
    
        /**
         * Get information from specific media.
         *
         * @param \Silex\Application $app
         *  Silex Application.
         * @param $media
         *  Category of the media at search.
         * @param $id
         *  Identifier of the media at search.
         * @return mixed
         *  Twig renderer web page.
         * @since 1.0
         * @version 1.0
         */
        public function mediaAction(Application $app, $media, $id) {
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
            
            // Form builder.
            $search_form = $app['form.factory']->create(SearchType::class, new SearchEntity());
            $search_form_view = $search_form->createView();
            
            return $app['twig']->render('media.html.twig', array(
                'media' => $media,
                'search_form' => $search_form_view,
            ));
        }
    
        /**
         * Search result page.
         *
         * @param \Silex\Application $app
         *  Silex Application.
         * @param \Symfony\Component\HttpFoundation\Request $request
         *  Request who contains parameter get from form.
         * @return mixed
         *  Twig renderer web page.
         * @since 1.0
         * @version 1.0
         */
        public function searchAction(Application $app, Request $request) {
            // Form builder.
            $search = new SearchEntity();
            $search_form = $app['form.factory']->create(SearchType::class, $search);
            $search_form->handleRequest($request);
            $search_form_view = $search_form->createView();
    
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
    
            // Loop on each uri and get media with name get from search form.
            for ($i = 0; $i < $uri_size; ++$i) {
                $media_request = $app['rest']->get($uri[$i] . 'search/title/' . urlencode($search->getSearch()));
            
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
    
            // Return all medias found.
            return $app['twig']->render('search-result.html.twig', array(
                'animes'   => $animes,
                'cartoons' => $cartoons,
                'movies'   => $movies,
                'series'   => $series,
                'musics'   => $musics,
                'books'    => $books,
                'comics'   => $comics,
                'video_games' => $video_games,
                'search_form' => $search_form_view,
                'result_search' => $search->getSearch(),
            ));
        }
    
        /**
         * Registration page.
         *
         * @param \Silex\Application $app
         *  Silex Application.
         * @param \Symfony\Component\HttpFoundation\Request $request
         *  Interface used to encode password.
         * @since 1.0
         * @version 1.0
         */
        public function registerAction(Application $app, Request $request) {
            // Form builder.
            $search = new SearchEntity();
            $search_form = $app['form.factory']->create(SearchType::class, $search);
            $search_form_view = $search_form->createView();
            
            $user = new User();
            $register_form = $app['form.factory']->create(RegistrationType::class, $user);
    
            // User try to register on website.
            $register_form->handleRequest($request);
            if ($register_form->isSubmitted() && $register_form->isValid()) {
                // generate a random salt value
                $salt = substr(md5(time() . ""), 0, 23);
                $user->setSalt($salt);
                $plainPassword = $user->getPassword();
                
                // find the default encoder
                $encoder = $app['security.encoder.bcrypt'];
                
                // compute the encoded password
                $password = $encoder->encodePassword($plainPassword, $user->getSalt());
                $user->setPassword($password);
                $user->setRole('ROLE_ADMIN');
                    
                // Save on
                $app['dao.user']->save($user);
                return $app->redirect($app['url_generator']->generate('home'));
            }
            
            $register_form_view = $register_form->createView();
        
            return $app['twig']->render('register.html.twig', array(
                'error'         => $app['security.last_error']($request),
                'last_username' => $app['session']->get('_security.last_username'),
                'search_form' => $search_form_view,
                'register_form' => $register_form_view,
            ));
        }
    
        /**
         * Login page.
         *
         * @param \Silex\Application $app
         *  Silex Application.
         * @param \Symfony\Component\HttpFoundation\Request $request
         *  Request who contains parameter get from form.
         * @since 1.0
         * @version 1.0
         */
        public function loginAction(Application $app, Request $request) {
            // Form builder.
            $search = new SearchEntity();
            $search_form = $app['form.factory']->create(SearchType::class, $search);
            $search_form_view = $search_form->createView();
    
            $login = new User();
            $login_form = $app['form.factory']->create(LoginType::class, $login);
            $login_form_view = $login_form->createView();
            
            return $app['twig']->render('login.html.twig', array(
                'error'         => $app['security.last_error']($request),
                'last_username' => $app['session']->get('_security.last_username'),
                'search_form' => $search_form_view,
                'login_form' => $login_form_view,
            ));
        }
    }
