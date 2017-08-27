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
     * Class Anime.
     *
     * @author Nicolas GILLE
     * @package MediaClient\Model\Video
     * @since 1.0
     * @version 1.0
     */
    class Anime extends AbstractVideo {

        /**
         * Number of seasons for the anime.
         *
         * @pre
         *  getNumberOfSeasons() > 0
         * @var integer
         */
        protected $numberOfSeasons;

        /**
         * Current season of the anime.
         *
         * @pre
         *  getCurrentSeason() > 0
         * @var integer
         */
        protected $currentSeason;

        /**
         * Date of last release of the anime.
         *
         * @var mixed
         */
        protected $endDate;

        /**
         * Average runtime of an episode of the media.
         *
         * @pre
         *  getAverageEpisodeRuntime() > 0
         * @var integer
         */
        protected $averageEpisodeRuntime;

        /**
         * Number of episodes present on the current season.
         *
         * @pre
         *  getNumberOfEpisode() > 0
         * @var integer
         */
        protected $numberOfEpisode;

        /**
         * Max number of episodes present on the anime.
         *
         * @pre
         *  getMaxEpisodes() > 0
         * @var integer
         */
        protected $maxEpisodes;

        /**
         * Anime constructor.
         *
         * @param array $data
         *  All data of the anime.
         *
         * @since 1.0
         * @version 1.0
         */
        public function __construct(array $data) {
            $this->hydrate($data);
        }

        /**
         * Get the number of seasons for the anime.
         *
         * @return int
         *  The number of seasons.
         * @since 1.0
         * @version 1.0
         */
        public function getNumberOfSeasons(): int {
            return $this->numberOfSeasons;
        }

        /**
         * Set the number of seasons on anime.
         *
         * @param int $numberOfSeasons
         *  New number of seasons.
         *
         * @since 1.0
         * @version 1.0
         */
        public function setNumberOfSeasons(int $numberOfSeasons) {
            $this->numberOfSeasons = $numberOfSeasons;
        }

        /**
         * Get the current season of the anime.
         *
         * @return int
         *  Current season of the anime.
         * @since 1.0
         * @version 1.0
         */
        public function getCurrentSeason(): int {
            return $this->currentSeason;
        }

        /**
         * Set the current season of the anime.
         *
         * @param int $currentSeason
         *  New current season of the anime.
         *
         * @since 1.0
         * @version 1.0
         */
        public function setCurrentSeason(int $currentSeason) {
            $this->currentSeason = $currentSeason;
        }

        /**
         * Get the date of last release date of the anime.
         *
         * @return mixed
         *  The last release date of the anime.
         * @since 1.0
         * @version 1.0
         */
        public function getEndDate() {
            return $this->endDate;
        }

        /**
         * Set the last release date of the anime.
         *
         * @param mixed $endDate
         *  Last release date.
         *
         * @since 1.0
         * @version 1.0
         */
        public function setEndDate($endDate) {
            $this->endDate = $endDate;
        }

        /**
         * Get the average runtime of an episode of the anime.
         *
         * @return int
         *  The average time in minute of an episode.
         * @since 1.0
         * @version 1.0
         */
        public function getAverageEpisodeRuntime(): int {
            return $this->averageEpisodeRuntime;
        }

        /**
         * Set the average runtime of an episode.
         *
         * @param int $averageEpisodeRuntime
         *  New runtime of an episode.
         *
         * @since 1.0
         * @version 1.0
         */
        public function setAverageEpisodeRuntime(int $averageEpisodeRuntime) {
            $this->averageEpisodeRuntime = $averageEpisodeRuntime;
        }

        /**
         * Get the number of episode available on the current season.
         *
         * @return int
         *  Number of episode available on the current season.
         * @since 1.0
         * @version 1.0
         */
        public function getNumberOfEpisode(): int {
            return $this->numberOfEpisode;
        }

        /**
         * Set the number of episode available on the current season.
         *
         * @param int $numberOfEpisode
         *  New number of episode available on the current season.
         *
         * @since 1.0
         * @version 1.0
         */
        public function setNumberOfEpisode(int $numberOfEpisode) {
            $this->numberOfEpisode = $numberOfEpisode;
        }

        /**
         * Get the number of episode present on all anime.
         *
         * @return int
         *  Max number of episode on the anime.
         * @since 1.0
         * @version 1.0
         */
        public function getMaxEpisodes(): int {
            return $this->maxEpisodes;
        }

        /**
         * Set the number of episode present on the anime.
         *
         * @param int $maxEpisodes
         *  New max episodes on the anime.
         *
         * @since 1.0
         * @version 1.0
         */
        public function setMaxEpisodes(int $maxEpisodes) {
            $this->maxEpisodes = $maxEpisodes;
        }
    }
