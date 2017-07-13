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
    
    namespace MediaClient\Model\Game;
    use MediaClient\Model\AbstractMedia;

    /**
     * Class VideoGame
     *
     * @author Nicolas GILLE
     * @package MediaClient\Model\Game
     * @since 1.0
     * @version 1.0
     */
    class VideoGame extends AbstractMedia {
    
        /**
         * @var string
         */
        private $_originalTitle;
    
        /**
         * @var bool
         */
        private $_multiplayers;
    
        /**
         * @var array
         */
        private $_languagesSpoken;
    
        /**
         * @var array
         */
        private $_developers;
    
        /**
         * @var array
         */
        private $_publishers;
    
        /**
         * @var array
         */
        private $_platforms;
    
        /**
         * VideoGame constructor.
         *
         * @param array $data
         *  All data of the video game.
         * @since 1.0
         * @version 1.0
         */
        public function __construct(array $data) {
            $this->hydrate($data);
        }
    
        /**
         * @return string
         */
        public function getOriginalTitle(): string {
            return $this->_originalTitle;
        }
    
        /**
         * @param string $originalTitle
         */
        public function setOriginalTitle(string $originalTitle) {
            $this->_originalTitle = $originalTitle;
        }
    
        /**
         * @return boolean
         */
        public function isMultiplayers(): bool {
            return $this->_multiplayers;
        }
    
        /**
         * @param boolean $multiplayers
         */
        public function setMultiplayers(bool $multiplayers) {
            $this->_multiplayers = $multiplayers;
        }
    
        /**
         * @return array
         */
        public function getLanguagesSpoken(): array {
            return $this->_languagesSpoken;
        }
    
        /**
         * @param array $languagesSpoken
         */
        public function setLanguagesSpoken(array $languagesSpoken) {
            $this->_languagesSpoken = $languagesSpoken;
        }
    
        /**
         * @return array
         */
        public function getDevelopers(): array {
            return $this->_developers;
        }
    
        /**
         * @param array $developers
         */
        public function setDevelopers(array $developers) {
            $this->_developers = $developers;
        }
    
        /**
         * @return array
         */
        public function getPublishers(): array {
            return $this->_publishers;
        }
    
        /**
         * @param array $publishers
         */
        public function setPublishers(array $publishers) {
            $this->_publishers = $publishers;
        }
    
        /**
         * @return array
         */
        public function getPlatforms(): array {
            return $this->_platforms;
        }
    
        /**
         * @param array $platforms
         */
        public function setPlatforms(array $platforms) {
            $this->_platforms = $platforms;
        }
    }
