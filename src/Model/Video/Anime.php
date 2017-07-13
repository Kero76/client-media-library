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
     * Class Anime.
     *
     * @author Nicolas GILLE
     * @package MediaClient\Model\Video
     * @since 1.0
     * @version 1.0
     */
    class Anime extends AbstractVideo {
    
        /**
         * @var integer
         */
        protected $_numberOfSeasons;
    
        /**
         * @var integer
         */
        protected $_currentSeason;
    
        /**
         * @var mixed
         */
        protected $_endDate;
    
        /**
         * @var integer
         */
        protected $_averageEpisodeRuntime;
    
        /**
         * @var integer
         */
        protected $_numberOfEpisode;
    
        /**
         * @var integer
         */
        protected $_maxEpisodes;
    
        /**
         * Anime constructor.
         *
         * @param array $data
         *  All data of the anime.
         * @since 1.0
         * @version 1.0
         */
        public function __construct(array $data) {
            $this->hydrate($data);
        }
    
        /**
         * @return int
         */
        public function getNumberOfSeasons(): int {
            return $this->_numberOfSeasons;
        }
    
        /**
         * @param int $numberOfSeasons
         */
        public function setNumberOfSeasons(int $numberOfSeasons) {
            $this->_numberOfSeasons = $numberOfSeasons;
        }
    
        /**
         * @return int
         */
        public function getCurrentSeason(): int {
            return $this->_currentSeason;
        }
    
        /**
         * @param int $currentSeason
         */
        public function setCurrentSeason(int $currentSeason) {
            $this->_currentSeason = $currentSeason;
        }
    
        /**
         * @return mixed
         */
        public function getEndDate() {
            return $this->_endDate;
        }
    
        /**
         * @param mixed $endDate
         */
        public function setEndDate($endDate) {
            $this->_endDate = $endDate;
        }
    
        /**
         * @return int
         */
        public function getAverageEpisodeRuntime(): int {
            return $this->_averageEpisodeRuntime;
        }
    
        /**
         * @param int $averageEpisodeRuntime
         */
        public function setAverageEpisodeRuntime(int $averageEpisodeRuntime) {
            $this->_averageEpisodeRuntime = $averageEpisodeRuntime;
        }
    
        /**
         * @return int
         */
        public function getNumberOfEpisode(): int {
            return $this->_numberOfEpisode;
        }
    
        /**
         * @param int $numberOfEpisode
         */
        public function setNumberOfEpisode(int $numberOfEpisode) {
            $this->_numberOfEpisode = $numberOfEpisode;
        }
    
        /**
         * @return int
         */
        public function getMaxEpisodes(): int {
            return $this->_maxEpisodes;
        }
    
        /**
         * @param int $maxEpisodes
         */
        public function setMaxEpisodes(int $maxEpisodes) {
            $this->_maxEpisodes = $maxEpisodes;
        }
    
        /**
         *
         * @return string
         *
         * @since 1.0
         * @version 1.0
         */
        function __toString() : string {
            return 'Anime={' .
                'title=' . $this->_title .
                ' originalTitle=' . $this->_original_title .
                ' synopsis=' . $this->_synopsis .
                '';
        }
    }
