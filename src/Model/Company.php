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

    /**
     * Class Company.
     *
     * @author Nicolas GILLE
     * @package MediaClient\Model
     * @since 1.0
     * @version 1.0
     */
    class Company {
    
        /**
         * Name of the company.
         *
         * @var string
         */
        private $_name;
    
        /**
         * Company constructor.
         *
         * @param string $company
         *  Name of the company.
         * @since 1.0
         * @version 1.0
         */
        public function __construct(string $company) {
            $this->_name = $company;
        }
    
        /**
         * Return the name of the company.
         *
         * @return string
         *  Name of the company.
         * @since 1.0
         * @version 1.0
         */
        public function getName(): string {
            return $this->_name;
        }
    
        /**
         * Set the name of the company.
         *
         * @param string $name
         *  New name.
         * @since 1.0
         * @version 1.0
         */
        public function setName(string $name) {
            $this->_name = $name;
        }
    }
