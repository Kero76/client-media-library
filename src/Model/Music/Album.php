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
         * Number of tracks present on the album.
         *
         * @var integer
         */
        private $_nbTracks;
    
        /**
         * Length of the album on minutes and seconds.
         *
         * @var float
         */
        private $_length;
    
        /**
         * List of all label records for the album.
         *
         * @var array
         */
        private $_labelRecords;
    
        /**
         * List of the singer(s) or group(s) for the album.
         *
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
         * Get the number of tracks on the album.
         *
         * @return int
         *  Number of tracks.
         * @since 1.0
         * @version 1.0
         */
        public function getNbTracks(): int {
            return $this->_nbTracks;
        }
    
        /**
         * Set the number of track present on the album.
         *
         * @param int $nbTracks
         *  New number of tracks present on the album.
         * @since 1.0
         * @version 1.0
         */
        public function setNbTracks(int $nbTracks) {
            $this->_nbTracks = $nbTracks;
        }
    
        /**
         * Get the length of the album.
         *
         * @return float
         *  Length of the album.
         * @since 1.0
         * @version 1.0
         */
        public function getLength(): float {
            return $this->_length;
        }
    
        /**
         * Set the length of the album.
         *
         * @param float $length
         *  New length of the album.
         * @since 1.0
         * @version 1.0
         */
        public function setLength(float $length) {
            $this->_length = $length;
        }
    
        /**
         * Get the list of label records present on the album.
         *
         * @return array
         *  List of all label records.
         * @since 1.0
         * @version 1.0
         */
        public function getLabelRecords(): array {
            return $this->_labelRecords;
        }
    
        /**
         * Set the list of label records.
         *
         * @param array $labelRecords
         *  New list of label records.
         * @since 1.0
         * @version 1.0
         */
        public function setLabelRecords(array $labelRecords) {
            $this->_labelRecords = $labelRecords;
        }
    
        /**
         * List of all singers present on the album.
         *
         * @return array
         *  List of all singers present on the album.
         * @since 1.0
         * @version 1.0
         */
        public function getSingers(): array {
            return $this->_singers;
        }
    
        /**
         * Set the list of singers or groups.
         *
         * @param array $singers
         *  List of all singers or groups.
         * @since 1.0
         * @version 1.0
         */
        public function setSingers(array $singers) {
            $this->_singers = $singers;
        }
    }
