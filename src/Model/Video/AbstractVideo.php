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
    
    use MediaClient\Model\AbstractMedia;

    /**
     * Class AbstractVideo.
     *
     * This class is a representation of all Video media present on Media Library.
     *
     * @author Nicolas GILLE
     * @package MediaClient\Model\Video
     * @since 1.0
     * @version 1.0
     */
    abstract class AbstractVideo extends AbstractMedia {
    
        /**
         * Original title of the media.
         *
         * @var string
         */
        protected $_original_title;
    
        /**
         * An array with all languages available on the media.
         *
         * @var array
         */
        protected $_languages_spoken;
        
        /**
         * An array with all subtitles of the media.
         *
         * @var array
         */
        protected $_subtitles;
    
        /**
         * An array with all producers present on the media.
         *
         * @var array
         */
        protected $_producers;
    
        /**
         * An array with all directors present on the media.
         *
         * @var array
         */
        protected $_directors;
        
        /**
         * @return string
         */
        public function getOriginalTitle(): string {
            return $this->_original_title;
        }
    
        /**
         * @param string $original_title
         */
        public function setOriginalTitle(string $original_title) {
            $this->_original_title = $original_title;
        }
    
        /**
         * @return array
         */
        public function getLanguagesSpoken(): array {
            return $this->_languages_spoken;
        }
    
        /**
         * @param array $languages_spoken
         */
        public function setLanguagesSpoken(array $languages_spoken) {
            $this->_languages_spoken = $languages_spoken;
        }
    
        /**
         * @return array
         */
        public function getSubtitles(): array {
            return $this->_subtitles;
        }
    
        /**
         * @param array $subtitles
         */
        public function setSubtitles(array $subtitles) {
            $this->_subtitles = $subtitles;
        }
    
        /**
         * @return array
         */
        public function getProducers(): array {
            return $this->_producers;
        }
    
        /**
         * @param array $producers
         */
        public function setProducers(array $producers) {
            $this->_producers = $producers;
        }
    
        /**
         * @return array
         */
        public function getDirectors(): array {
            return $this->_directors;
        }
    
        /**
         * @param array $directors
         */
        public function setDirectors(array $directors) {
            $this->_directors = $directors;
        }
    }
