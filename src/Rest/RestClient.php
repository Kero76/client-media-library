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
    
    namespace MediaClient\Rest;
    
    use GuzzleHttp\Client;
    use MediaClient\Http\HttpCodeStatus;

    /**
     * Class RestClient used to interact with MediaLibrary restful service.
     *
     * @author Nicolas GILLE
     * @package MediaLibrary\Rest
     * @since 1.0
     * @version 1.0
     */
    class RestClient {
    
        /**
         * URI of the restful service.
         *
         * @var string
         *  URI of the restful service.
         * @since 1.0
         */
        public static $_REST_SERVICE_URI = "Http://localhost:8080/media-library/";
    
        /**
         * Client object used to interact with the restful service.
         *
         * @var \GuzzleHttp\Client
         * @since 1.0
         */
        private $_client;
    
        /**
         * RestClient constructor.
         *
         * Instantiate the client of the Restful service with initial settings.
         *
         * @constructor
         * @since 1.0
         * @version 1.0
         */
        public function __construct() {
            $this->_client = new Client([
                'base_uri' => RestClient::$_REST_SERVICE_URI,
                'timeout'  => 2,
            ]);
        }
        
        /**
         * Get specific media from the restful service thanks to the URI passed on parameter.
         *
         * @param string $uri
         *  URI request to get media.
         * @return array
         *  Return the response as a String.
         * @since 1.0
         * @version 1.0
         */
        public function get(string $uri) : array {
            $response = $this->_client->get($uri);
    
            switch ($response->getStatusCode()) {
                // Response is OK
                case HttpCodeStatus::OK()->getValue() :
                    return \GuzzleHttp\json_decode($response->getBody(), true);
                    break;
        
                // Response is OK, but it return nothing.
                case HttpCodeStatus::NO_CONTENT()->getValue() :
                    return array(
                        "code_error" => HttpCodeStatus::NO_CONTENT()->getValue(),
                        "message" => "No content found.",
                    );
                    break;
        
                // Wrong URI.
                case HttpCodeStatus::NOT_FOUND()->getValue() :
                    return array(
                        "code_error" => HttpCodeStatus::NOT_FOUND()->getValue(),
                        "message" => "Not found.",
                    );
                    break;
            }
            return array();
        }
    
        /**
         * Post new media on Media Library.
         *
         * The media is previously encode in JSON format to respect the operation of Media Library.
         * In fact, it receive an object on JSON format and transform it to insert it on Database.
         * So, the media passed on parameter must encode in JSON format before sending on service.
         *
         * @param string $uri
         *  URI request to post new media.
         * @param string $media
         *  Media at post on body on format json.
         * @return bool
         *  Return TRUE or FALSE if the media post worked or not.
         * @see json_encode()
         * @since 1.0
         * @version 1.0
         */
        public function post(string $uri, string $media) : bool {
            $response = $this->_client->request('POST', $uri, $media);
            
            return $response->getStatusCode() == HttpCodeStatus::CREATED()->getValue();
        }
    }
