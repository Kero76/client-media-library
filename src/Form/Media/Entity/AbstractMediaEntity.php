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

    namespace MediaClient\Form\Media\Entity;

    /**
     * Abstract class AbstractMedia.
     *
     * This class is a representation of all medias available on Media Library.
     * It must inherit by all sub-medias present on Media Library.
     * This class implement a method to hydrate object directly without
     *
     * @author Nicolas GILLE
     * @package MediaClient\Model
     * @since 1.0
     * @version 1.0
     */
    abstract class AbstractMediaEntity {

        /**
         * Unique identifier of the media.
         *
         * @var int
         */
        protected $_id = -1;

        /**
         * Title of the media.
         *
         * @var string
         */
        protected $_title = '';

        /**
         * Synopsis of the media.
         *
         * @var string
         */
        protected $_synopsis = '';

        /**
         * Release date of the media.
         *
         * @var mixed
         */
        protected $_releaseDate = null;

        /**
         * List of all genres of the media.
         *
         * @var array
         */
        protected $_genres = array();

        /**
         * List of all supports of the media.
         *
         * @var array
         */
        protected $_supports = array();

        /**
         * Get identifier of the media.
         *
         * @return int
         *  The identifier of the media.
         * @since 1.0
         * @version 1.0
         */
        public function getId(): int {
            return $this->_id;
        }

        /**
         * Set the id of the media.
         *
         * @param int $id
         *  New id.
         *
         * @since 1.0
         * @version 1.0
         */
        public function setId(int $id) {
            $this->_id = $id;
        }

        /**
         * Get title of the media.
         *
         * @return string
         *  The title.
         * @since 1.0
         * @version 1.0
         */
        public function getTitle(): string {
            return $this->_title;
        }

        /**
         * Set the title of the media.
         *
         * @param string $title
         *  New title.
         *
         * @since 1.0
         * @version 1.0
         */
        public function setTitle(string $title) {
            $this->_title = $title;
        }

        /**
         * Get the synopsis of the media.
         *
         * @return string
         *  Synopsis of the media.
         * @since 1.0
         * @version 1.0
         */
        public function getSynopsis(): string {
            return $this->_synopsis;
        }

        /**
         * Set the synopsis of the media.
         *
         * @param string $synopsis
         *  New synopsis.
         *
         * @since 1.0
         * @version 1.0
         */
        public function setSynopsis(string $synopsis) {
            $this->_synopsis = $synopsis;
        }

        /**
         * Get release date of the media.
         *
         * @return mixed
         *  Get date of release.
         * @since 1.0
         * @version 1.0
         */
        public function getReleaseDate() {
            return $this->_releaseDate;
        }

        /**
         * Set release date of media.
         *
         * @param mixed $releaseDate
         *  New release date of media.
         *
         * @since 1.0
         * @version 1.0
         */
        public function setReleaseDate($releaseDate) {
            $this->_releaseDate = $releaseDate;
        }

        /**
         * Get genres of media.
         *
         * @return array
         *  Genres of media.
         * @since 1.0
         * @version 1.0
         */
        public function getGenres(): array {
            return $this->_genres;
        }

        /**
         * Set genres of media.
         *
         * @param array $genres
         *  New genres.
         *
         * @since 1.0
         * @version 1.0
         */
        public function setGenres(array $genres) {
            $this->_genres = $genres;
        }

        /**
         * Get supports of media.
         *
         * @return array
         *  Support of media.
         * @since 1.0
         * @version 1.0
         */
        public function getSupports(): array {
            return $this->_supports;
        }

        /**
         * Set support of media.
         *
         * @param array $supports
         *  New support of media.
         *
         * @since 1.0
         * @version 1.0
         */
        public function setSupports(array $supports) {
            $this->_supports = $supports;
        }

        /**
         * Get the json representation of the entity.
         *
         * @return string
         *  Return the json representation of the entity.
         * @since 1.0
         * @version 1.0
         */
        abstract function getJson(): string;
    }
