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
    /**
     * Class Anime.
     *
     * @author Nicolas GILLE
     * @package MediaClient\Model\Video
     * @since 1.0
     * @version 1.0
     */
    class AnimeEntity extends AbstractVideoEntity {
        
        /**
         * Number of seasons for the anime.
         *
         * @var integer
         */
        protected $_numberOfSeasons = -1;
        
        /**
         * Current season of the anime.
         *
         * @var integer
         */
        protected $_currentSeason = -1;
        
        /**
         * Date of last release of the anime.
         *
         * @var mixed
         */
        protected $_endDate = null;
        
        /**
         * Average runtime of an episode of the media.
         *
         * @var integer
         */
        protected $_averageEpisodeRuntime = -1;
        
        /**
         * Number of episodes present on the current season.
         *
         * @var integer
         */
        protected $_numberOfEpisode = -1;
        
        /**
         * Max number of episodes present on the anime.
         *
         * @var integer
         */
        protected $_maxEpisodes = -1;
        
        /**
         * Get the number of seasons for the anime.
         *
         * @return int
         *  The number of seasons.
         * @since 1.0
         * @version 1.0
         */
        public function getNumberOfSeasons(): int {
            return $this->_numberOfSeasons;
        }
        
        /**
         * Set the number of seasons on anime.
         *
         * @param int $numberOfSeasons
         *  New number of seasons.
         * @since 1.0
         * @version 1.0
         */
        public function setNumberOfSeasons(int $numberOfSeasons) {
            $this->_numberOfSeasons = $numberOfSeasons;
        }
        
        /**
         * Get the current season of the anime.
         *
         * @return int
         *  Current season of the anime.
         * @since 1.0
         * @version 1.0
         */
        public function getCurrentSeason(): int {
            return $this->_currentSeason;
        }
        
        /**
         * Set the current season of the anime.
         *
         * @param int $currentSeason
         *  New current season of the anime.
         * @since 1.0
         * @version 1.0
         */
        public function setCurrentSeason(int $currentSeason) {
            $this->_currentSeason = $currentSeason;
        }
        
        /**
         * Get the date of last release date of the anime.
         *
         * @return mixed
         *  The last release date of the anime.
         * @since 1.0
         * @version 1.0
         */
        public function getEndDate() {
            return $this->_endDate;
        }
        
        /**
         * Set the last release date of the anime.
         *
         * @param mixed $endDate
         *  Last release date.
         * @since 1.0
         * @version 1.0
         */
        public function setEndDate($endDate) {
            $this->_endDate = $endDate;
        }
        
        /**
         * Get the average runtime of an episode of the anime.
         *
         * @return int
         *  The average time in minute of an episode.
         * @since 1.0
         * @version 1.0
         */
        public function getAverageEpisodeRuntime(): int {
            return $this->_averageEpisodeRuntime;
        }
        
        /**
         * Set the average runtime of an episode.
         *
         * @param int $averageEpisodeRuntime
         *  New runtime of an episode.
         * @since 1.0
         * @version 1.0
         */
        public function setAverageEpisodeRuntime(int $averageEpisodeRuntime) {
            $this->_averageEpisodeRuntime = $averageEpisodeRuntime;
        }
        
        /**
         * Get the number of episode available on the current season.
         *
         * @return int
         *  Number of episode available on the current season.
         * @since 1.0
         * @version 1.0
         */
        public function getNumberOfEpisode(): int {
            return $this->_numberOfEpisode;
        }
        
        /**
         * Set the number of episode available on the current season.
         *
         * @param int $numberOfEpisode
         *  New number of episode available on the current season.
         * @since 1.0
         * @version 1.0
         */
        public function setNumberOfEpisode(int $numberOfEpisode) {
            $this->_numberOfEpisode = $numberOfEpisode;
        }
        
        /**
         * Get the number of episode present on all anime.
         *
         * @return int
         *  Max number of episode on the anime.
         * @since 1.0
         * @version 1.0
         */
        public function getMaxEpisodes(): int {
            return $this->_maxEpisodes;
        }
        
        /**
         * Set the number of episode present on the anime.
         *
         * @param int $maxEpisodes
         *  New max episodes on the anime.
         * @since 1.0
         * @version 1.0
         */
        public function setMaxEpisodes(int $maxEpisodes) {
            $this->_maxEpisodes = $maxEpisodes;
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
    
            $data = array(
                'id' => $this->getId(),
                'title' => $this->getTitle(),
                'originalTitle' => $this->getOriginalTitle(),
                'synopsis' => $this->getSynopsis(),
                'releaseDate' => $this->getReleaseDate()->format('Y-m-d'),
                'endDate' => $this->getEndDate()->format('Y-m-d'),
                'languagesSpoken' => $this->getLanguagesSpoken(),
                'subtitles' => $this->getSubtitles(),
                'genres' => $this->getGenres(),
                'supports' => $this->getSupports(),
                'numberOfSeasons' => $this->getNumberOfSeasons(),
                'currentSeason' => $this->getCurrentSeason(),
                'averageEpisodeRuntime' => $this->getAverageEpisodeRuntime(),
                'numberOfEpisode' => $this->getNumberOfEpisode(),
                'maxEpisodes' => $this->getMaxEpisodes(),
                'directors' => $directors,
                'producers' => $producers,
            );
    
            return json_encode($data);
        }
    }
