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
     * along with Media-Client. If not, see <http://www.gnu.org/licenses/>.
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
        protected $originalTitle;

        /**
         * An array with all languages available on the media.
         *
         * @var array
         */
        protected $languagesSpoken;

        /**
         * An array with all subtitles of the media.
         *
         * @var array
         */
        protected $subtitles;

        /**
         * An array with all producers present on the media.
         *
         * @var array
         */
        protected $producers;

        /**
         * An array with all directors present on the media.
         *
         * @var array
         */
        protected $directors;

        /**
         * Get original title of the media.
         *
         * @return string
         *  The original title of the media.
         * @since 1.0
         * @version 1.0
         */
        public function getOriginalTitle(): string {
            return $this->originalTitle;
        }

        /**
         * Set the original title of the media.
         *
         * @param string $originalTitle
         *  New original title of the media.
         *
         * @since 1.0
         * @version 1.0
         */
        public function setOriginalTitle(string $originalTitle) {
            $this->originalTitle = $originalTitle;
        }

        /**
         * Get all languages available on media.
         *
         * @return array
         *  A set of all languages spoken on format ISO-639-1
         * @since 1.0
         * @version 1.0
         */
        public function getLanguagesSpoken(): array {
            return $this->languagesSpoken;
        }

        /**
         * Set the list of all languages spoken available on media.
         *
         * @param array $languagesSpoken
         *  An array with all new languages spoken on format ISO-639-1
         *
         * @since 1.0
         * @version 1.0
         */
        public function setLanguagesSpoken(array $languagesSpoken) {
            $this->languagesSpoken = $languagesSpoken;
        }

        /**
         * Get the list of all subtitles available on media who respected the format ISO-639-1.
         *
         * @return array
         *  An array with all subtitles on format ISO-639-1.
         * @since 1.0
         * @version 1.0
         */
        public function getSubtitles(): array {
            return $this->subtitles;
        }

        /**
         * Set the list of all subtitles available on media.
         *
         * @param array $subtitles
         *  An array with all subtitles on format ISO-639-1.
         *
         * @since 1.0
         * @version 1.0
         */
        public function setSubtitles(array $subtitles) {
            $this->subtitles = $subtitles;
        }

        /**
         * Get the list of all producers present on media.
         *
         * @return array
         *  An array with all producers.
         * @since 1.0
         * @version 1.0
         */
        public function getProducers(): array {
            return $this->producers;
        }

        /**
         * Set the list of producers of the media.
         *
         * @param array $producers
         *  New list of all producers.
         *
         * @since 1.0
         * @version 1.0
         */
        public function setProducers(array $producers) {
            $this->producers = $producers;
        }

        /**
         * Get the list of all directors present on media.
         *
         * @return array
         *  List of all directors present on the media.
         * @since 1.0
         * @version 1.0
         */
        public function getDirectors(): array {
            return $this->directors;
        }

        /**
         * Set the list of all directors present on the media.
         *
         * @param array $directors
         *  New list of directors present on the media.
         *
         * @since 1.0
         * @version 1.0
         */
        public function setDirectors(array $directors) {
            $this->directors = $directors;
        }
    }
