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
    use MediaClient\Form\Media\Entity\Book\BookEntity;
    use MediaClient\Form\Media\Entity\Book\ComicEntity;
    use MediaClient\Form\Media\Entity\Game\VideoGameEntity;
    use MediaClient\Form\Media\Entity\Music\MusicEntity;
    use MediaClient\Form\Media\Entity\Video\AnimeEntity;
    use MediaClient\Form\Media\Entity\Video\CartoonEntity;
    use MediaClient\Form\Media\Entity\Video\MovieEntity;
    use MediaClient\Form\Media\Entity\Video\SeriesEntity;
    use MediaClient\Form\Media\Type\AnimeType;
    use MediaClient\Form\Media\Type\BookType;
    use MediaClient\Form\Media\Type\CartoonType;
    use MediaClient\Form\Media\Type\ComicType;
    use MediaClient\Form\Media\Type\MovieType;
    use MediaClient\Form\Media\Type\MusicType;
    use MediaClient\Form\Media\Type\SeriesType;
    use MediaClient\Form\Media\Type\VideoGameType;
    use MediaClient\Form\Search\SearchEntity;
    use MediaClient\Form\Search\SearchType;
    use MediaClient\Http\HttpCodeStatus;
    use MediaClient\Model\Media;
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
            $uri      = array('animes', 'cartoons', 'movies', 'series', 'musics', 'books', 'comics', 'video-games');
            $uri_size = count($uri);
            $medias = array();
        
            // Loop on each uri and get all medias.
            for ($i = 0; $i < $uri_size; ++$i) {
                $media_request = $app['rest']->get($uri[$i] . '/'); // Get all specific media.
                $medias[$i] = array();
                
                if (isset($media_request['code_error']) && $media_request['code_error'] == HttpCodeStatus::NO_CONTENT()->getValue()) {
                    $medias[$i] = array();
                } else {
                    // Loop on each media and place it on
                    foreach ($media_request as $k) {
                        $id = $k['id'];
                        $medias[$i][$id] = new Media($k);
                    }
                }
            }
        
            // Form builder.
            $search_form = $app['form.factory']->create(SearchType::class, new SearchEntity());
            $search_form_view = $search_form->createView();
        
            // Return all medias.
            return $app['twig']->render('admin/home.html.twig', array(
                'animes'   => $medias[0],
                'cartoons' => $medias[1],
                'movies'   => $medias[2],
                'series'   => $medias[3],
                'musics'   => $medias[4],
                'books'    => $medias[5],
                'comics'   => $medias[6],
                'video_games' => $medias[7],
                'search_form' => $search_form_view,
            ));
        }
    
        /**
         * Get form to add media.
         *
         * @param \Silex\Application $app
         *  Silex App.
         * @param \Symfony\Component\HttpFoundation\Request $request
         *  Request who contains Media at insert.
         * @param string $media
         *  Current media at add on Media Library.
         * @return \Symfony\Component\HttpFoundation\RedirectResponse
         *  Twig render flux.
         * @since 1.0
         * @version 1.0
         */
        public function addMediaAction(Application $app, Request $request, string $media) {
            $template_name = '';
            $media_form = '';
            $media_object = null;
            
            switch ($media) {
                case 'animes' :
                    $media_object = new AnimeEntity();
                    $media_form = $app['form.factory']->create(AnimeType::class, $media_object);
                    $template_name = 'admin/form/anime-form.html.twig';
                    break;
        
                case 'cartoons' :
                    $media_object = new CartoonEntity();
                    $media_form = $app['form.factory']->create(CartoonType::class, $media_object);
                    $template_name = 'admin/form/cartoon-form.html.twig';
                    break;
        
                case 'movies' :
                    $media_object = new MovieEntity();
                    $media_form = $app['form.factory']->create(MovieType::class, $media_object);
                    $template_name = 'admin/form/movie-form.html.twig';
                    break;
        
                case 'series' :
                    $media_object = new SeriesEntity();
                    $media_form = $app['form.factory']->create(SeriesType::class, $media_object);
                    $template_name = 'admin/form/series-form.html.twig';
                    break;
        
                case 'books' :
                    $media_object = new BookEntity();
                    $media_form = $app['form.factory']->create(BookType::class, $media_object);
                    $template_name = 'admin/form/book-form.html.twig';
                    break;
        
                case 'comics' :
                    $media_object = new ComicEntity();
                    $media_form = $app['form.factory']->create(ComicType::class, $media_object);
                    $template_name = 'admin/form/comic-form.html.twig';
                    break;
        
                case 'musics' :
                    $media_object = new MusicEntity();
                    $media_form = $app['form.factory']->create(MusicType::class, $media_object);
                    $template_name = 'admin/form/music-form.html.twig';
                    break;
        
                case 'video-games' :
                    $media_object = new VideoGameEntity();
                    $media_form = $app['form.factory']->create(VideoGameType::class, $media_object);
                    $template_name = 'admin/form/video-game-form.html.twig';
                    break;
            }
    
            // Get request object to check if the form is valid and submitted by the user.
            $media_form->handleRequest($request);
            if ($media_form->isSubmitted() && $media_form->isValid()) {
                // Post object on service.
                $app['rest']->post($media . '/', $media_object->getJson());
                
                // Redirect admin into admin/home
                return $app->redirect($app['url_generator']->generate('admin'));
            }
            $media_form_view = $media_form->createView();
    
            // Search form builder.
            $search_form = $app['form.factory']->create(SearchType::class, new SearchEntity());
            $search_form_view = $search_form->createView();
            
            // Return all medias.
            return $app['twig']->render($template_name, array(
                'search_form' => $search_form_view,
                'media_form' => $media_form_view,
                'media' => $media,
            ));
        }
    
        /**
         * Get form to update media.
         *
         * @param \Silex\Application $app
         *  Silex App.
         * @param \Symfony\Component\HttpFoundation\Request $request
         *  Request who contains Media at insert.
         * @param integer $id
         *  Identifier of the media at update use to get media from service.
         * @param string $media
         *  Current media at add on Media Library.
         * @return \Symfony\Component\HttpFoundation\RedirectResponse
         *  Twig render flux.
         * @since 1.0
         * @version 1.0
         */
        public function updateMediaAction(Application $app, Request $request, int $id, string $media) {
            
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
