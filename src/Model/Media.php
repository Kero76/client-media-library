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
    
    namespace MediaClient\Model;
    use DateTime;

    /**
     * Representation of all Media present on the service.
     *
     * @author Nicolas GILLE
     * @package MediaClient\Model
     * @since 1.0
     * @version 1.0
     */
    class Media {
        
        /**
         * Unique identifier of the media.
         *
         * @var int
         */
        private $_id = -1;
    
        /**
         * Title of the media.
         *
         * @var string
         */
        private $_title = '';
    
        /**
         * Original title of the media.
         *
         * @var string
         */
        private $_original_title = '';
        
        /**
         * Synopsis of the media.
         *
         * @var string
         */
        private $_synopsis = '';
    
        /**
         * Release date of the media.
         *
         * @var \DateTime
         */
        private $_releaseDate = null;
        
        /**
         * Date of last release of the anime.
         *
         * @var \DateTime
         */
        private $_endDate = null;
    
        /**
         * List of all genres of the media.
         *
         * @var array
         */
        private $_genres = array();
    
        /**
         * List of all supports of the media.
         *
         * @var array
         */
        private $_supports = array();
        
        /**
         * An array with all languages available on the media.
         *
         * @var array
         */
        private $_languages_spoken = array();
    
        /**
         * An array with all subtitles of the media.
         *
         * @var array
         */
        private $_subtitles = array();
    
        /**
         * Number of seasons for the anime.
         *
         * @var integer
         */
        private $_numberOfSeasons = -1;
    
        /**
         * Current season of the anime.
         *
         * @var integer
         */
        private $_currentSeason = -1;
    
        /**
         * Average runtime of an episode of the media.
         *
         * @var integer
         */
        private $_averageEpisodeRuntime = -1;
    
        /**
         * Number of episodes present on the current season.
         *
         * @var integer
         */
        private $_numberOfEpisode = -1;
    
        /**
         * Max number of episodes present on the anime.
         *
         * @var integer
         */
        private $_maxEpisodes = -1;
    
        /**
         * Runtime of the cartoon.
         *
         * @var integer
         */
        private $_runtime = -1;
        
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
        private $_length = 0.0;
    
        /**
         * Indicate if the video game is multiplayable or not.
         *
         * @var bool
         */
        private $_multiplayers = false;
    
        /**
         * Platforms for the video game (video game console).
         *
         * @var array
         */
        private $_platforms = array();
    
        /**
         * ISBN of the book.
         *
         * @var string
         */
        private $_isbn = '';
    
        /**
         * Number of pages present on the book.
         *
         * @var int
         */
        private $_nbPages = -1;
    
        /**
         * Format of the book.
         *
         * @var string
         */
        private $_format = '';
    
        /**
         * The volumes present on the comic.
         *
         * @var int
         */
        private $_volumes = -1;
    
        /**
         * The current volume of the book.
         *
         * @var int
         */
        private $_currentVolume = -1;
    
        /**
         * An array with all producers present on the media.
         *
         * @var array
         */
        private $_producers = array();
    
        /**
         * An array with all directors present on the media.
         *
         * @var array
         */
        private $_directors = array();
    
        /**
         * List of all actors present on Movie.
         *
         * @var array
         */
        private $_mainActors = array();
    
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
         * List of all developers.
         *
         * @var array
         */
        private $_developers = array();
    
        /**
         * List of publishers.
         *
         * @var array
         */
        private $_publishers = array();
        
        /**
         * List of authors who writing book.
         *
         * @var array
         */
        private $_authors = array();
        
        /**
         * List of illustrators who illustrate comics.
         *
         * @var array
         */
        private $_illustrators = array();
    
        /**
         * Media constructor.
         *
         * @param array $data
         *  An array with all data get from REST service.
         * @since 1.0
         * @version 1.0
         */
        public function __construct(array $data = array()) {
            $this->hydrate($data);
        }
    
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
         * @since 1.0
         * @version 1.0
         */
        public function setSupports(array $supports) {
            $this->_supports = $supports;
        }
    
        /**
         * Get original title of the media.
         *
         * @return string
         *  The original title of the media.
         * @since 1.0
         * @version 1.0
         */
        public function getOriginalTitle(): string {
            return $this->_original_title;
        }
    
        /**
         * Set the original title of the media.
         *
         * @param string $original_title
         *  New original title of the media.
         * @since 1.0
         * @version 1.0
         */
        public function setOriginalTitle(string $original_title) {
            $this->_original_title = $original_title;
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
            return $this->_languages_spoken;
        }
    
        /**
         * Set the list of all languages spoken available on media.
         *
         * @param array $languages_spoken
         *  An array with all new languages spoken on format ISO-639-1
         * @since 1.0
         * @version 1.0
         */
        public function setLanguagesSpoken(array $languages_spoken) {
            $this->_languages_spoken = $languages_spoken;
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
            return $this->_subtitles;
        }
    
        /**
         * Set the list of all subtitles available on media.
         *
         * @param array $subtitles
         *  An array with all subtitles on format ISO-639-1.
         * @since 1.0
         * @version 1.0
         */
        public function setSubtitles(array $subtitles) {
            $this->_subtitles = $subtitles;
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
            return $this->_producers;
        }
    
        /**
         * Set the list of producers of the media.
         *
         * @param array $producers
         *  New list of all producers.
         * @since 1.0
         * @version 1.0
         */
        public function setProducers(array $producers) {
            $this->_producers = $producers;
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
            return $this->_directors;
        }
    
        /**
         * Set the list of all directors present on the media.
         *
         * @param array $directors
         *  New list of directors present on the media.
         * @since 1.0
         * @version 1.0
         */
        public function setDirectors(array $directors) {
            $this->_directors = $directors;
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
            return $this->_numberOfSeasons;
        }
    
        /**
         * Set the number of seasons on anime.
         *
         * @param int $numberOfSeasons
         *  New number of seasons.
         * @since 1.0
         * @version 1.0
         */
        public function setNumberOfSeasons(int $numberOfSeasons) {
            $this->_numberOfSeasons = $numberOfSeasons;
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
            return $this->_currentSeason;
        }
    
        /**
         * Set the current season of the anime.
         *
         * @param int $currentSeason
         *  New current season of the anime.
         * @since 1.0
         * @version 1.0
         */
        public function setCurrentSeason(int $currentSeason) {
            $this->_currentSeason = $currentSeason;
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
            return $this->_endDate;
        }
    
        /**
         * Set the last release date of the anime.
         *
         * @param mixed $endDate
         *  Last release date.
         * @since 1.0
         * @version 1.0
         */
        public function setEndDate($endDate) {
            $this->_endDate = $endDate;
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
            return $this->_averageEpisodeRuntime;
        }
    
        /**
         * Set the average runtime of an episode.
         *
         * @param int $averageEpisodeRuntime
         *  New runtime of an episode.
         * @since 1.0
         * @version 1.0
         */
        public function setAverageEpisodeRuntime(int $averageEpisodeRuntime) {
            $this->_averageEpisodeRuntime = $averageEpisodeRuntime;
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
            return $this->_numberOfEpisode;
        }
    
        /**
         * Set the number of episode available on the current season.
         *
         * @param int $numberOfEpisode
         *  New number of episode available on the current season.
         * @since 1.0
         * @version 1.0
         */
        public function setNumberOfEpisode(int $numberOfEpisode) {
            $this->_numberOfEpisode = $numberOfEpisode;
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
            return $this->_maxEpisodes;
        }
    
        /**
         * Set the number of episode present on the anime.
         *
         * @param int $maxEpisodes
         *  New max episodes on the anime.
         * @since 1.0
         * @version 1.0
         */
        public function setMaxEpisodes(int $maxEpisodes) {
            $this->_maxEpisodes = $maxEpisodes;
        }
    
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
         * @since 1.0
         * @version 1.0
         */
        public function setRuntime(int $runtime) {
            $this->_runtime = $runtime;
        }
    
        /**
         * Get the list of all actors present on the series.
         *
         * @return array
         *  List of all actors.
         * @since 1.0
         * @version 1.0
         */
        public function getMainActors(): array {
            return $this->_mainActors;
        }
    
        /**
         * Set the list of actors present on the series.
         *
         * @param array $mainActors
         *  New list of actors.
         * @since 1.0
         * @version 1.0
         */
        public function setMainActors(array $mainActors) {
            $this->_mainActors = $mainActors;
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
    
    
        /**
         * Get the ISBN.
         *
         * @return string
         *  The ISBN of the book.
         * @since 1.0
         * @version 1.0
         */
        public function getIsbn(): string {
            return $this->_isbn;
        }
    
        /**
         * Set the ISBN of the book.
         *
         * @param string $isbn
         *  New ISBN of the book.
         * @since 1.0
         * @version 1.0
         */
        public function setIsbn(string $isbn) {
            $this->_isbn = $isbn;
        }
    
        /**
         * Get the number of pages on the book.
         *
         * @return int
         *  The number of pages on the book.
         * @since 1.0
         * @version 1.0
         */
        public function getNbPages(): int {
            return $this->_nbPages;
        }
    
        /**
         * Set the number of pages on the book.
         *
         * @param int $nbPages
         *  New number of pages of the book.
         * @since 1.0
         * @version 1.0
         */
        public function setNbPages(int $nbPages) {
            $this->_nbPages = $nbPages;
        }
    
        /**
         * Get the list of all authors of the book.
         *
         * @return array
         *  An array with all authors of the book.
         * @since 1.0
         * @version 1.0
         */
        public function getAuthors(): array {
            return $this->_authors;
        }
    
        /**
         * Set the authors of the book.
         *
         * @param array $authors
         *  New array of authors for the book.
         * @since 1.0
         * @version 1.0
         */
        public function setAuthors(array $authors) {
            $this->_authors = $authors;
        }
    
        /**
         * Get the list of all illustrators of the book.
         *
         * @return array
         *  An array with all illustrators of the book.
         * @since 1.0
         * @version 1.0
         */
        public function getIllustrators(): array {
            return $this->_illustrators;
        }
    
        /**
         * Set the illustrators of the book.
         *
         * @param array $illustrators
         *  New array of illustrators for the book.
         * @since 1.0
         * @version 1.0
         */
        public function setIllustrators(array $illustrators) {
            $this->_illustrators = $illustrators;
        }
    
        /**
         * Get the format of the book.
         *
         * @return string
         *  The format of the book.
         * @since 1.0
         * @version 1.0
         */
        public function getFormat(): string {
            return $this->_format;
        }
    
        /**
         * Set the format of the book.
         *
         * @param string $format
         *  The new format of the book.
         * @since 1.0
         * @version 1.0
         */
        public function setFormat(string $format) {
            $this->_format = $format;
        }
    
        /**
         * Get the number of volumes of the book.
         *
         * @return int
         *  The number of volumes of the book.
         * @since 1.0
         * @version 1.0
         */
        public function getVolumes(): int {
            return $this->_volumes;
        }
    
        /**
         * Set the number of volumes of the book.
         *
         * @param int $volumes
         *  The new number of volumes of the book.
         * @since 1.0
         * @version 1.0
         */
        public function setVolumes(int $volumes) {
            $this->_volumes = $volumes;
        }
    
        /**
         * Get the current volume of the comic.
         *
         * @return int
         *  The current volume of the book.
         * @since 1.0
         * @version 1.0
         */
        public function getCurrentVolume(): int {
            return $this->_currentVolume;
        }
    
        /**
         * Set the current volume of the book.
         *
         * @param int $currentVolume
         *  New current volume of the book.
         * @since 1.0
         * @version 1.0
         */
        public function setCurrentVolume(int $currentVolume) {
            $this->_currentVolume = $currentVolume;
        }
        
        /**
         * Call in constructor to build directly object thanks data receive from the array.
         *
         * @access private
         * @param array $data
         *  An array with all data get from REST service.
         * @since 1.0
         * @version 1.0
         */
        private function hydrate(array $data) {
            foreach($data as $key => $value) {
                $method = 'set';
                $keySplit = explode("_", $key); // split key name if contains XXX_XXX_XXX
                $count = count($keySplit);
                for ($i = 0; $i < $count; $i++ ) {
                    $method .= ucfirst($keySplit[$i]); // Replace first characters of each word in uppercase form.
                }
                
                // Execute method if exists on is object.
                if(method_exists($this, $method)) {
                    $this->$method($value);
                }
            }
        }
    }
