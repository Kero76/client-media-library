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
    
    namespace MediaClient\Model\Video;

    /**
     * Class Movie
     *
     * @author Nicolas GILLE
     * @package MediaClient\Model\Video
     * @since 1.0
     * @version 1.0
     */
    class Movie extends Cartoon {
    
        /**
         * @var array
         */
        private $_mainActors;
    
        /**
         * Movie constructor.
         *
         * @param array $data
         *  All data of the movie.
         * @since 1.0
         * @version 1.0
         */
        public function __construct(array $data) {
            parent::__construct($data);
        }
    
        /**
         * @return array
         */
        public function getMainActors(): array {
            return $this->_mainActors;
        }
    
        /**
         * @param array $mainActors
         */
        public function setMainActors(array $mainActors) {
            $this->_mainActors = $mainActors;
        }
    }
