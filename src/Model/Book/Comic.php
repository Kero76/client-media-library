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
         * The volumes present on the comic.
         *
         * @pre
         *  getVolumes() > 0
         * @var int
         */
        private $volumes;
        
        /**
         * The current volume of the book.
         *
         * @pre
         *  0 < getCurrentVolume() <= getVolumes()
         * @var int
         */
        private $currentVolume;
    
        /**
         * List of illustrators who illustrate comics.
         *
         * @var array
         */
        private $illustrators = array();
        
        /**
         * Comic constructor.
         *
         * @param array $data
         *  All data of the comic.
         * @since 1.0
         * @version 1.0
         */
        public function __construct(array $data) {
            parent::__construct($data);
            $this->hydrate($data);
        }
        
        /**
         * Get the number of volumes of the book.
         *
         * @return int
         *  The number of volumes of the book.
         * @since 1.0
         * @version 1.0
         */
        public function getVolumes(): int {
            return $this->volumes;
        }
        
        /**
         * Set the number of volumes of the book.
         *
         * @param int $volumes
         *  The new number of volumes of the book.
         * @since 1.0
         * @version 1.0
         */
        public function setVolumes(int $volumes) {
            $this->volumes = $volumes;
        }
        
        /**
         * Get the current volume of the comic.
         *
         * @return int
         *  The current volume of the book.
         * @since 1.0
         * @version 1.0
         */
        public function getCurrentVolume(): int {
            return $this->currentVolume;
        }
        
        /**
         * Set the current volume of the book.
         *
         * @param int $currentVolume
         *  New current volume of the book.
         * @since 1.0
         * @version 1.0
         */
        public function setCurrentVolume(int $currentVolume) {
            $this->currentVolume = $currentVolume;
        }
    
        /**
         * Get the list of all illustrators of the book.
         *
         * @return array
         *  An array with all illustrators of the book.
         * @since 1.0
         * @version 1.0
         */
        public function getIllustrators(): array {
            return $this->illustrators;
        }
    
        /**
         * Set the illustrators of the book.
         *
         * @param array $illustrators
         *  New array of illustrators for the book.
         * @since 1.0
         * @version 1.0
         */
        public function setIllustrators(array $illustrators) {
            $this->illustrators = $illustrators;
        }
    }
