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
    
    namespace MediaClient\Form\Media\Entity\Music;
    
    use MediaClient\Form\Media\Entity\AbstractMediaEntity;
    use MediaClient\Model\Company;
    use MediaClient\Model\Person;

    /**
     * Class Music
     *
     * @author Nicolas GILLE
     * @package MediaClient\Model\Music
     * @since 1.0
     * @version 1.0
     */
    class MusicEntity extends AbstractMediaEntity  {
        
        /**
         * Number of tracks present on the album.
         *
         * @var integer
         */
        private $_nbTracks = -1;
        
        /**
         * Length of the album on minutes and seconds.
         *
         * @var float
         */
        private $_length = -1.0;
        
        /**
         * List of all label records for the album.
         *
         * @var array
         */
        private $_labelRecords = array();
        
        /**
         * List of the singer(s) or group(s) for the album.
         *
         * @var array
         */
        private $_singers = array();
    
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
            $labelRecords = array();
            foreach ($this->_labelRecords as $labelRecord) {
                $labelRecords[] = new Company($labelRecord);
            }
            return $labelRecords;
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
            $singers = array();
            foreach ($this->_singers as $singer) {
                $singers[] = new Person($singer);
            }
            return $singers;
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
    
    
        /**
         * Get the json representation of the entity.
         * @return string
         *  Return the json representation of the entity.
         * @since 1.0
         * @version 1.0
         */
        function getJson() : string {
            $labelRecords = array();
            foreach ($this->getLabelRecords() as $labelRecord) {
                $labelRecords[] = array(
                    'name' => $labelRecord->getName(),
                );
            }
    
            $singers = array();
            foreach ($this->getSingers() as $singer) {
                $singers[] = array(
                    'firstName' => $singer->getFirstName(),
                    'lastName'  => $singer->getLastName(),
                );
            }
    
            $data = array(
                'id' => $this->getId(),
                'title' => $this->getTitle(),
                'synopsis' => $this->getSynopsis(),
                'releaseDate' => $this->getReleaseDate()->getTimestamp(),
                'genres' => $this->getGenres(),
                'supports' => $this->getSupports(),
                'nbTracks' => $this->getNbTracks(),
                'length' => $this->getLength(),
                'labelRecords' => $labelRecords,
                'singers' => $singers,
            );
            
            return json_encode($data);
        }
    }
