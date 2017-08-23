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
    
    namespace MediaClient\Controller;
    
    use MediaClient\Form\Registration\RegistrationType;
    use MediaClient\Form\Search\SearchEntity;
    use MediaClient\Form\Search\SearchType;
    use MediaClient\Http\HttpCodeStatus;
    use MediaClient\Model\Book\Book;
    use MediaClient\Model\Book\Comic;
    use MediaClient\Model\Game\VideoGame;
    use MediaClient\Model\Media;
    use MediaClient\Model\Music\Album;
    use MediaClient\Model\Video\Anime;
    use MediaClient\Model\Video\Cartoon;
    use MediaClient\Model\Video\Movie;
    use MediaClient\Model\Video\Series;
    use MediaClient\User\User;
    use MediaClient\Utils\Pagination;
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
         * Get home page composed by X last media insert on the app.
         *
         * @param \Silex\Application $app
         *  Silex Application
         * @return mixed
         *  Twig renderer web page.
         * @since 1.0
         * @version 1.0
         */
        public function homeAction(Application $app) {
            $mediaName = array('animes', 'cartoons', 'movies', 'series', 'musics', 'books', 'comics', 'video-games');
            $mediaReturn = array();
            $mediaRequest = $app['rest']->get('home/');
            
            // Loop on each media type name, create an array for each media type and instantiate object on it.
            foreach ($mediaName as $mediaType) {
                $mediaReturn[$mediaType] = array();
                switch ($mediaType) {
                    case 'animes':
                        foreach ($mediaRequest[$mediaType] as $mediaData) {
                            $id = $mediaData['id'];
                            $mediaReturn[$mediaType][$id] = new Anime($mediaData);
                        }
                        break;

                    case 'cartoons':
                        foreach ($mediaRequest[$mediaType] as $mediaData) {
                            $id = $mediaData['id'];
                            $mediaReturn[$mediaType][$id] = new Cartoon($mediaData);
                        }
                        break;

                    case 'movies':
                        foreach ($mediaRequest[$mediaType] as $mediaData) {
                            $id = $mediaData['id'];
                            $mediaReturn[$mediaType][$id] = new Movie($mediaData);
                        }
                        break;

                    case 'series':
                        foreach ($mediaRequest[$mediaType] as $mediaData) {
                            $id = $mediaData['id'];
                            $mediaReturn[$mediaType][$id] = new Series($mediaData);
                        }
                        break;

                    case 'books':
                        foreach ($mediaRequest[$mediaType] as $mediaData) {
                            $id = $mediaData['id'];
                            $mediaReturn[$mediaType][$id] = new Book($mediaData);
                        }
                        break;

                    case 'comics':
                        foreach ($mediaRequest[$mediaType] as $mediaData) {
                            $id = $mediaData['id'];
                            $mediaReturn[$mediaType][$id] = new Comic($mediaData);
                        }
                        break;

                    case 'video-games':
                        foreach ($mediaRequest[$mediaType] as $mediaData) {
                            $id = $mediaData['id'];
                            $mediaReturn[$mediaType][$id] = new VideoGame($mediaData);
                        }
                        break;

                    case 'musics':
                        foreach ($mediaRequest[$mediaType] as $mediaData) {
                            $id = $mediaData['id'];
                            $mediaReturn[$mediaType][$id] = new Album($mediaData);
                        }
                        break;
                }
            }

            // Build the search form object present on the view.
            $search_form = $app['form.factory']->create(SearchType::class, new SearchEntity());
            $search_form_view = $search_form->createView();
    
            return $app['twig']->render('home.html.twig', array(
                'animes'   => array_reverse($mediaReturn[$mediaName[0]]),
                'cartoons' => array_reverse($mediaReturn[$mediaName[1]]),
                'movies'   => array_reverse($mediaReturn[$mediaName[2]]),
                'series'   => array_reverse($mediaReturn[$mediaName[3]]),
                'musics'   => array_reverse($mediaReturn[$mediaName[4]]),
                'books'    => array_reverse($mediaReturn[$mediaName[5]]),
                'comics'   => array_reverse($mediaReturn[$mediaName[6]]),
                'video_games' => array_reverse($mediaReturn[$mediaName[7]]),
                'search_form' => $search_form_view,
            ));
        }
    
        /**
         * Get all specific media.
         *
         * For example, this page return all "Movies" present on the app.
         *
         * @param \Silex\Application $app
         *  Silex Application.
         * @param $media
         *  Sort of media at display.
         * @param \Symfony\Component\HttpFoundation\Request $request
         *  Request use to get parameters from HTTP request.
         * @return mixed
         *  Twig renderer web page.
         * @since 1.0
         * @version 1.0
         */
        public function mediasAction(Application $app, Request $request, string $media) {
            // Get the list of precise media.
            $media_request = $app['rest']->get($media . '/');
    
            // Check if an error occurred during HTTP request and generate an empty array for the view.
            if (isset($media_request['code_error']) && $media_request['code_error'] === HttpCodeStatus::NO_CONTENT()->getValue()) {
                $media_object_list = array();
            } else {
                // Loop on media request and create an instance of right Media.
                $media_object_list = array();
                switch ($media) {
                    case 'animes':
                        foreach ($media_request as $m) {
                            $id = $m['id'];
                            $media_object_list[$id] = new Anime($m);
                        }
                        break;
        
                    case 'cartoons':
                        foreach ($media_request as $m) {
                            $id = $m['id'];
                            $media_object_list[$id] = new Cartoon($m);
                        }
                        break;
        
                    case 'movies':
                        foreach ($media_request as $m) {
                            $id = $m['id'];
                            $media_object_list[$id] = new Movie($m);
                        }
                        break;
        
                    case 'series':
                        foreach ($media_request as $m) {
                            $id = $m['id'];
                            $media_object_list[$id] = new Series($m);
                        }
                        break;
        
                    case 'books':
                        foreach ($media_request as $m) {
                            $id = $m['id'];
                            $media_object_list[$id] = new Book($m);
                        }
                        break;
        
                    case 'comics':
                        foreach ($media_request as $m) {
                            $id = $m['id'];
                            $media_object_list[$id] = new Comic($m);
                        }
                        break;
        
                    case 'video-games':
                        foreach ($media_request as $m) {
                            $id = $m['id'];
                            $media_object_list[$id] = new VideoGame($m);
                        }
                        break;
        
                    case 'musics':
                        foreach ($media_request as $m) {
                            $id = $m['id'];
                            $media_object_list[$id] = new Album($m);
                        }
                        break;
                }
            }
            
            // Build the search form object present on the view.
            $search_form = $app['form.factory']->create(SearchType::class, new SearchEntity());
            $search_form_view = $search_form->createView();
            $search_form_view = $search_form->createView();
            
            // Generate the list of Pagination::$ELEMENTS_DISPLAYED at send on parameter for the view.
            $active_pagination_element = $request->get('pagination');
            $media_list = array_slice(
                $media_object_list,
                $active_pagination_element * Pagination::$ELEMENTS_DISPLAYED,
                Pagination::$ELEMENTS_DISPLAYED
            );
    
            // Create an instance of Pagination with the current position of cursor on pagination and size of data at display.
            $pagination = new Pagination(intval($active_pagination_element), count($media_object_list));
    
            return $app['twig']->render('media-list.html.twig', array(
                'medias' => $media_list,
                'media_type' => $media,
                'pagination' => $pagination,
                'search_form' => $search_form_view,
            ));
        }
    
        /**
         * Get information from specific and precise media.
         *
         * This page display the information relative to a specific media like
         * "Star Wars - A New Hope" for a precise movie, ...
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
            // Get the media by is id.
            $media_data = $app['rest']->get($media . '/search/id/' . $id);
    
            // Check if an error occurred during HTTP request.
            if (isset($medias['code_error']) && $medias['code_error'] === HttpCodeStatus::NO_CONTENT()->getValue()) {
                $media_data = array();
            }
            // In other case, it build instance of right media with all data.
            else {
                // Problem with timestamp who contains 13 instead of 10 chars.
                // So divide it by 1000 and the timestamp become correct.
                $media_data['releaseDate'] = $media_data['releaseDate'] / 1000;
    
                // Same correction for endDate, but it check if exist previous process to avoid NullPointerExpection problem.
                if (isset($media_data['endDate']) === true) {
                    $media_data['endDate'] = $media_data['endDate'] / 1000;
                }
    
                // Switch on media type and create right instance of media corresponding to the media parameter receive from the uri.
                $media_object = null;
                switch ($media) {
                    case 'animes':
                        $media_object = new Anime($media_data);
                        break;
        
                    case 'cartoons':
                        $media_object = new Cartoon($media_data);
                        break;
        
                    case 'movies':
                        $media_object = new Movie($media_data);
                        break;
        
                    case 'series':
                        $media_object = new Series($media_data);
                        break;
        
                    case 'books':
                        $media_object = new Book($media_data);
                        break;
        
                    case 'comics':
                        $media_object = new Comic($media_data);
                        break;
        
                    case 'video-games':
                        $media_object = new VideoGame($media_data);
                        break;
        
                    case 'musics':
                        $media_object = new Album($media_data);
                        break;
                }
            }
            
            // Build the search form object present on the view.
            $search_form = $app['form.factory']->create(SearchType::class, new SearchEntity());
            $search_form_view = $search_form->createView();
            
            return $app['twig']->render('media.html.twig', array(
                'media' => $media_object,
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
            // Get parameter from search field.
            $search = new SearchEntity();
            $search_form = $app['form.factory']->create(SearchType::class, $search);
            $search_form->handleRequest($request);
            $search_form_view = $search_form->createView();
            
            // Instantiate uri's at request to search on each media present on app.
            $uri = array('animes', 'cartoons', 'movies', 'series', 'musics', 'books', 'comics', 'video-games');
            $uri_size = count($uri);
            $media_list = array();
    
            // Loop on each uri and get all medias.
            for ($i = 0; $i < $uri_size; ++$i) {
                $media_request = $app['rest']->get($uri[$i] . '/search/title/' . urlencode($search->getSearch()));
                $media_list[$i] = array();
        
                if (isset($media_request['code_error']) && $media_request['code_error'] == HttpCodeStatus::NO_CONTENT()->getValue()) {
                    $media_list[$i] = array();
                } else {
                    // Switch on media type from uri and instantiate right object.
                    switch ($uri[$i]) {
                        case 'animes':
                            foreach ($media_request as $m) {
                                $id = $m['id'];
                                $media_list[$i][$id] = new Anime($m);
                            }
                            break;
        
                        case 'cartoons':
                            foreach ($media_request as $m) {
                                $id = $m['id'];
                                $media_list[$i][$id] = new Cartoon($m);
                            }
                            break;
        
                        case 'movies':
                            foreach ($media_request as $m) {
                                $id = $m['id'];
                                $media_list[$i][$id] = new Movie($m);
                            }
                            break;
        
                        case 'series':
                            foreach ($media_request as $m) {
                                $id = $m['id'];
                                $media_list[$i][$id] = new Series($m);
                            }
                            break;
        
                        case 'books':
                            foreach ($media_request as $m) {
                                $id = $m['id'];
                                $media_list[$i][$id] = new Book($m);
                            }
                            break;
        
                        case 'comics':
                            foreach ($media_request as $m) {
                                $id = $m['id'];
                                $media_list[$i][$id] = new Comic($m);
                            }
                            break;
        
                        case 'video-games':
                            foreach ($media_request as $m) {
                                $id = $m['id'];
                                $media_list[$i][$id] = new VideoGame($m);
                            }
                            break;
        
                        case 'musics':
                            foreach ($media_request as $m) {
                                $id = $m['id'];
                                $media_list[$i][$id] = new Album($m);
                            }
                            break;
                    }
                }
            }
    
            // If search found something, this variable became true and it use to indicate the result in view.
            $media_found = false;
            foreach ($media_list as $array) {
                if (!empty($array)) {
                    $media_found = true;
                }
            }
    
            // Return all medias found.
            return $app['twig']->render('search-result.html.twig', array(
                'media_result' => array(
                    'animes' => $media_list[0],
                    'cartoons' => $media_list[1],
                    'movies' => $media_list[2],
                    'series' => $media_list[3],
                    'musics' => $media_list[4],
                    'books' => $media_list[5],
                    'comics' => $media_list[6],
                    'video-games' => $media_list[7],
                ),
                'search_form' => $search_form_view,
                'result_search' => array(
                    'subject_search' => $search->getSearch(),
                    'subject_found' => $media_found,
                ),
            ));
        }
    
        /**
         * Registration page.
         *
         * @param \Silex\Application $app
         *  Silex Application.
         * @param \Symfony\Component\HttpFoundation\Request $request
         *  Interface used to encode password.
         * @return string
         *  The template render.
         * @since 1.0
         * @version 1.0
         */
        public function registerAction(Application $app, Request $request) {
            // Search form builder.
            $search = new SearchEntity();
            $search_form = $app['form.factory']->create(SearchType::class, $search);
            $search_form_view = $search_form->createView();
            
            // Instantiate a User hydrate by the data get from the registration form.
            $user = new User();
            $register_form = $app['form.factory']->create(RegistrationType::class, $user);
    
            // User try to register on website.
            $register_form->handleRequest($request);
            if ($register_form->isSubmitted() && $register_form->isValid()) {
                // Generate a random salt value.
                $salt = substr(md5(time() . ""), 0, 23);
                $user->setSalt($salt);
                $plainPassword = $user->getPassword();
                
                // Find the default encoder
                $encoder = $app['security.encoder.bcrypt'];
                
                // Compute the encoded password
                $password = $encoder->encodePassword($plainPassword, $user->getSalt());
                $user->setPassword($password);
                $user->setRole('ROLE_ADMIN');
                    
                // Save the user on database and redirect the user on home page.
                $app['dao.user']->save($user);
                return $app->redirect($app['url_generator']->generate('home'));
            }
            
            // Generate the view of the register form.
            $register_form_view = $register_form->createView();
        
            return $app['twig']->render('register.html.twig', array(
                'error' => $app['security.last_error']($request),
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
            // Build search form at display on page.
            $search = new SearchEntity();
            $search_form = $app['form.factory']->create(SearchType::class, $search);
            $search_form_view = $search_form->createView();
            
            return $app['twig']->render('login.html.twig', array(
                'error' => $app['security.last_error']($request),
                'last_username' => $app['session']->get('_security.last_username'),
                'search_form' => $search_form_view,
            ));
        }
    }
