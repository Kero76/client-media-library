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
    
    namespace MediaClient\Form\Media\Entity\Video;
    use MediaClient\Model\Person;

    /**
     * Class Movie
     *
     * @author Nicolas GILLE
     * @package MediaClient\Model\Video
     * @since 1.0
     * @version 1.0
     */
    class MovieEntity extends CartoonEntity {
        
        /**
         * List of all actors present on Movie.
         *
         * @var array
         */
        private $_mainActors = array();
        
        /**
         * Get all actors present on the movie.
         *
         * @return array
         *  List of all actors.
         * @since 1.0
         * @version 1.0
         */
        public function getMainActors(): array {
            $actors = array();
            foreach ($this->_mainActors as $actor) {
                $actors[] = new Person($actor);
            }
            return $actors;
        }
        
        /**
         * Set the list of actors present on the movie.
         *
         * @param array $mainActors
         *  New list of actors.
         * @since 1.0
         * @version 1.0
         */
        public function setMainActors(array $mainActors) {
            $this->_mainActors = $mainActors;
        }
    
        /**
         * Get the json representation of the entity.
         * @return string
         *  Return the json representation of the entity.
         * @since 1.0
         * @version 1.0
         */
        function getJson() : string {
            $directors = array();
            foreach ($this->getDirectors() as $director) {
                $directors[] = array(
                    'firstName' => $director->getFirstName(),
                    'lastName'  => $director->getLastName(),
                );
            }
        
            $producers = array();
            foreach ($this->getProducers() as $producer) {
                $producers[] = array(
                    'firstName' => $producer->getFirstName(),
                    'lastName'  => $producer->getLastName(),
                );
            }
        
            $actors = array();
            foreach ($this->getMainActors() as $actor) {
                $actors[] = array(
                    'firstName' => $actor->getFirstName(),
                    'lastName'  => $actor->getLastName(),
                );
            }
        
            $data = array(
                'id' => $this->getId(),
                'title' => $this->getTitle(),
                'originalTitle' => $this->getOriginalTitle(),
                'synopsis' => $this->getSynopsis(),
                'releaseDate' => $this->getReleaseDate()->getTimestamp(),
                'languagesSpoken' => $this->getLanguagesSpoken(),
                'subtitles' => $this->getSubtitles(),
                'runtime' => $this->getRuntime(),
                'genres' => $this->getGenres(),
                'supports' => $this->getSupports(),
                'directors' => $directors,
                'producers' => $producers,
                'mainActors' => $actors,
            );
        
            return json_encode($data);
        }
    }
