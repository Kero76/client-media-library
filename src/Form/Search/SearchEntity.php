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
    
    namespace MediaClient\Form\Search;

    /**
     * Class SearchEntity
     *
     * @author Nicolas GILLE
     * @package MediaClient\Form\Search
     * @since 1.0
     * @version 1.0
     */
    class SearchEntity {
    
        /**
         * Research object.
         *
         * @var string
         */
        private $_search = "";
    
        /**
         * Get the search object.
         *
         * @return string
         *  Search information from search bar on app.
         * @since 1.0
         * @version 1.0
         */
        public function getSearch() : string {
            return $this->_search;
        }
    
        /**
         * Set the search object.
         *
         * @param string $search
         *  Research from the search bar.
         * @since 1.0
         * @version 1.0
         */
        public function setSearch($search) {
            $this->_search = $search;
        }
    }
