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
    
    namespace MediaClient\Model\Book;

    /**
     * Class Comic
     *
     * @author Nicolas GILLE
     * @package MediaClient\Model\Book
     * @since 1.0
     * @version 1.0
     */
    class Comic extends Book {
    
        /**
         * @var int
         */
        private $_volumes;
    
        /**
         * @var int
         */
        private $_currentVolume;
    
        /**
         * Comic constructor.
         *
         * @param array $data
         *  All data of the comic.
         * @since 1.0
         * @version 1.0
         */
        public function __construct(array $data) {
            $this->hydrate($data);
        }
    
        /**
         * @return int
         */
        public function getVolumes(): int {
            return $this->_volumes;
        }
    
        /**
         * @param int $volumes
         */
        public function setVolumes(int $volumes) {
            $this->_volumes = $volumes;
        }
    
        /**
         * @return int
         */
        public function getCurrentVolume(): int {
            return $this->_currentVolume;
        }
    
        /**
         * @param int $currentVolume
         */
        public function setCurrentVolume(int $currentVolume) {
            $this->_currentVolume = $currentVolume;
        }
    }
