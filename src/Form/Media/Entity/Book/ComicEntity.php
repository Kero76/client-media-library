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
    
    namespace MediaClient\Form\Media\Entity\Book;
    use MediaClient\Model\Person;

    /**
     * Class Comic
     *
     * @author Nicolas GILLE
     * @package MediaClient\Model\Book
     * @since 1.0
     * @version 1.0
     */
    class ComicEntity extends BookEntity {
        
        /**
         * The volumes present on the comic.
         *
         * @var int
         */
        private $_volumes = -1;
        
        /**
         * The current volume of the book.
         *
         * @var int
         */
        private $_currentVolume = -1;
    
        /**
         * List of illustrators.
         *
         * @var array
         */
        private $_illustrators = array();
        
        /**
         * Get the number of volumes of the book.
         *
         * @return int
         *  The number of volumes of the book.
         * @since 1.0
         * @version 1.0
         */
        public function getVolumes(): int {
            return $this->_volumes;
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
            $this->_volumes = $volumes;
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
            return $this->_currentVolume;
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
            $this->_currentVolume = $currentVolume;
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
            $illustrators = array();
            foreach ($this->_illustrators as $illustrator) {
                $illustrators[] = new Person($illustrator);
            }
            return $illustrators;
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
            $this->_illustrators = $illustrators;
        }
    
        /**
         * Get the json representation of the entity.
         * @return string
         *  Return the json representation of the entity.
         * @since 1.0
         * @version 1.0
         */
        function getJson() : string {
            $publishers = array();
            foreach ($this->getPublishers() as $publisher) {
                $publishers[] = array(
                    'name' => $publisher->getName(),
                );
            }
        
            $authors = array();
            foreach ($this->getAuthors() as $author) {
                $authors[] = array(
                    'firstName' => $author->getFirstName(),
                    'lastName'  => $author->getLastName(),
                );
            }
        
            $illustrators = array();
            foreach ($this->getIllustrators() as $illustrator) {
                $illustrators[] = array(
                    'firstName' => $illustrator->getFirstName(),
                    'lastName'  => $illustrator->getLastName(),
                );
            }
        
            $data = array(
                'id' => $this->getId(),
                'title' => $this->getTitle(),
                'originalTitle' => $this->getOriginalTitle(),
                'synopsis' => $this->getSynopsis(),
                'releaseDate' => $this->getReleaseDate()->format('Y-m-d'),
                'genres' => $this->getGenres(),
                'supports' => $this->getSupports(),
                'isbn' => $this->getIsbn(),
                'nbPages' => $this->getNbPages(),
                'format' => strtoupper($this->getFormat()),
                'authors' => $authors,
                'publishers' => $publishers,
                'illustrators' => $illustrators,
            );
        
            return json_encode($data);
        }
    }
