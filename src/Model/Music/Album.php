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
    
    namespace MediaClient\Model\Music;
    
    use MediaClient\Model\AbstractMedia;

    /**
     * Class Album
     *
     * @author Nicolas GILLE
     * @package MediaClient\Model\Music
     * @since 1.0
     * @version 1.0
     */
    class Album extends AbstractMedia {
    
        /**
         * @var integer
         */
        private $_nbTracks;
    
        /**
         * @var float
         */
        private $_length;
    
        /**
         * @var array
         */
        private $_labelRecords;
    
        /**
         * @var array
         */
        private $_singers;
    
        /**
         * Album constructor.
         *
         * @param array $data
         *  All data of the album.
         * @since 1.0
         * @version 1.0
         */
        public function __construct(array $data) {
            $this->hydrate($data);
        }
    
        /**
         * @return int
         */
        public function getNbTracks(): int {
            return $this->_nbTracks;
        }
    
        /**
         * @param int $nbTracks
         */
        public function setNbTracks(int $nbTracks) {
            $this->_nbTracks = $nbTracks;
        }
    
        /**
         * @return float
         */
        public function getLength(): float {
            return $this->_length;
        }
    
        /**
         * @param float $length
         */
        public function setLength(float $length) {
            $this->_length = $length;
        }
    
        /**
         * @return array
         */
        public function getLabelRecords(): array {
            return $this->_labelRecords;
        }
    
        /**
         * @param array $labelRecords
         */
        public function setLabelRecords(array $labelRecords) {
            $this->_labelRecords = $labelRecords;
        }
    
        /**
         * @return array
         */
        public function getSingers(): array {
            return $this->_singers;
        }
    
        /**
         * @param array $singers
         */
        public function setSingers(array $singers) {
            $this->_singers = $singers;
        }
    }
