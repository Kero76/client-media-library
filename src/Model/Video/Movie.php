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

    /**
     * Class Movie.
     *
     * @author Nicolas GILLE
     * @package MediaClient\Model\Video
     * @since 1.0
     * @version 1.0
     */
    class Movie extends Cartoon {

        /**
         * List of all actors present on Movie.
         *
         * @var array
         */
        private $mainActors;

        /**
         * Movie constructor.
         *
         * @param array $data
         *  All data of the movie.
         *
         * @since 1.0
         * @version 1.0
         */
        public function __construct(array $data) {
            parent::__construct($data);
        }

        /**
         * Get all actors present on the movie.
         *
         * @return array
         *  List of all actors.
         * @since 1.0
         * @version 1.0
         */
        public function getMainActors(): array {
            return $this->mainActors;
        }

        /**
         * Set the list of actors present on the movie.
         *
         * @param array $mainActors
         *  New list of actors.
         *
         * @since 1.0
         * @version 1.0
         */
        public function setMainActors(array $mainActors) {
            $this->mainActors = $mainActors;
        }
    }
