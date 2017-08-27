<?php
    /**
     * MediaClient.
     * Copyright (C) 2017 Nicolas GILLE
     *
     * This program is free software: you can redistribute it and/or modify
     * it under the terms of the GNU General Public License as published by
     * the Free Software Foundation, either version 3 of the License, or
     * (at your option) any later version.
     *
     * This program is distributed in the hope that it will be useful,
     * but WITHOUT ANY WARRANTY; without even the implied warranty of
     * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
     * GNU General Public License for more details.
     *
     * You should have received a copy of the GNU General Public License
     * along with this program.  If not, see <http://www.gnu.org/licenses/>.
     */

    declare(strict_types=1);

    namespace MediaClient\Form\Media\Entity\Video;

    /**
     * Class Cartoon.
     *
     * @author Nicolas GILLE
     * @package MediaClient\Model\Video
     * @since 1.0
     * @version 1.0
     */
    class CartoonEntity extends AbstractVideoEntity {

        /**
         * Runtime of the cartoon.
         *
         * @var integer
         */
        protected $_runtime = -1;

        /**
         * Get the runtime of the cartoon.
         *
         * @return int
         *  The runtime of the cartoon.
         * @since 1.0
         * @version 1.0
         */
        public function getRuntime(): int {
            return $this->_runtime;
        }

        /**
         * Set the runtime of the cartoon.
         *
         * @param int $runtime
         *  New runtime of the cartoon.
         *
         * @since 1.0
         * @version 1.0
         */
        public function setRuntime(int $runtime) {
            $this->_runtime = $runtime;
        }

        /**
         * Get the json representation of the entity.
         *
         * @return string
         *  Return the json representation of the entity.
         * @since 1.0
         * @version 1.0
         */
        function getJson(): string {
            $directors = array();
            foreach ($this->getDirectors() as $director) {
                $directors[] = array(
                    'firstName' => $director->getFirstName(),
                    'lastName' => $director->getLastName(),
                );
            }

            $producers = array();
            foreach ($this->getProducers() as $producer) {
                $producers[] = array(
                    'firstName' => $producer->getFirstName(),
                    'lastName' => $producer->getLastName(),
                );
            }

            $data = array(
                'id' => $this->getId(),
                'title' => $this->getTitle(),
                'originalTitle' => $this->getOriginalTitle(),
                'synopsis' => $this->getSynopsis(),
                'releaseDate' => $this->getReleaseDate()
                                      ->format('Y-m-d'),
                'languagesSpoken' => array_map('strtolower', $this->getLanguagesSpoken()),
                'subtitles' => array_map('strtolower', $this->getSubtitles()),
                'runtime' => $this->getRuntime(),
                'genres' => array_map('strtoupper', $this->getGenres()),
                'supports' => array_map('strtoupper', $this->getSupports()),
                'directors' => $directors,
                'producers' => $producers,
            );

            return json_encode($data);
        }
    }
