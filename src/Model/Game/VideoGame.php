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
         * Original title of the video game.
         *
         * @var string
         */
        private $_originalTitle;
    
        /**
         * Indicate if the video game is multiplayable or not.
         *
         * @var bool
         */
        private $_multiplayers;
    
        /**
         * @var array
         */
        private $_languagesSpoken;
    
        /**
         * List of all developers.
         *
         * @var array
         */
        private $_developers;
    
        /**
         * List of publishers.
         *
         * @var array
         */
        private $_publishers;
    
        /**
         * Platforms for the video game (video game console).
         *
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
         * Get the original title of the video game.
         *
         * @return string
         *  Original title of the media.
         * @since 1.0
         * @version 1.0
         */
        public function getOriginalTitle(): string {
            return $this->_originalTitle;
        }
    
        /**
         * Set the original title of the media.
         *
         * @param string $originalTitle
         *  New original title of the media.
         * @since 1.0
         * @version 1.0
         */
        public function setOriginalTitle(string $originalTitle) {
            $this->_originalTitle = $originalTitle;
        }
    
        /**
         * Return if the video game is multiplayable or not.
         *
         * @return boolean
         *  True or false in function of the game can play at multi or not.
         * @since 1.0
         * @version 1.0
         */
        public function isMultiplayers(): bool {
            return $this->_multiplayers;
        }
    
        /**
         * Set the variable multiplayers.
         *
         * @param boolean $multiplayers
         *  New value of multiplayer boolean.
         * @since 1.0
         * @version 1.0
         */
        public function setMultiplayers(bool $multiplayers) {
            $this->_multiplayers = $multiplayers;
        }
    
        /**
         * Get the list of language spoken on format ISO-639-1.
         *
         * @return array
         *  List of all language spoken available on the video game.
         * @since 1.0
         * @version 1.0
         */
        public function getLanguagesSpoken(): array {
            return $this->_languagesSpoken;
        }
    
        /**
         * Set the list of language spoken on format ISO-639-1.
         *
         * @param array $languagesSpoken
         *  New list of languages spoken.
         * @since 1.0
         * @version 1.0
         */
        public function setLanguagesSpoken(array $languagesSpoken) {
            $this->_languagesSpoken = $languagesSpoken;
        }
    
        /**
         * List of all developers present on the video game.
         *
         * @return array
         *  New list of developers.
         * @since 1.0
         * @version 1.0
         */
        public function getDevelopers(): array {
            return $this->_developers;
        }
    
        /**
         * Set the list of developers.
         *
         * @param array $developers
         *  New list of developers.
         * @since 1.0
         * @version 1.0
         */
        public function setDevelopers(array $developers) {
            $this->_developers = $developers;
        }
    
        /**
         * Get the list of publishers.
         *
         * @return array
         *  The list of publishers.
         * @since 1.0
         * @version 1.0
         */
        public function getPublishers(): array {
            return $this->_publishers;
        }
    
        /**
         * Set the list of publishers.
         *
         * @param array $publishers
         *  New list of publishers.
         * @since 1.0
         * @version 1.0
         */
        public function setPublishers(array $publishers) {
            $this->_publishers = $publishers;
        }
    
        /**
         * Get the list of platform.
         *
         * @return array
         *  The list of platform.
         * @since 1.0
         * @version 1.0
         */
        public function getPlatforms(): array {
            return $this->_platforms;
        }
    
        /**
         * Set the list of platform.
         *
         * @param array $platforms
         *  New list of platforms.
         * @since 1.0
         * @version 1.0
         */
        public function setPlatforms(array $platforms) {
            $this->_platforms = $platforms;
        }
    }
