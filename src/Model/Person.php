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
     * Class Person.
     *
     * @author Nicolas GILLE
     * @package MediaClient\Model
     * @since 1.0
     * @version 1.0
     */
    class Person {
    
        /**
         * First name of the person.
         *
         * @var string
         */
        private $_firstName;
    
        /**
         * Last name of the person.
         *
         * @var string
         */
        private $_lastName;
    
        /**
         * Get the first name of the person.
         *
         * @return string
         *  First name.
         * @since 1.0
         * @version 1.0
         */
        public function getFirstName(): string {
            return $this->_firstName;
        }
    
        /**
         * Set the first name of the person.
         *
         * @param string $firstName
         *  New first name of the person.
         * @since 1.0
         * @version 1.0
         */
        public function setFirstName(string $firstName) {
            $this->_firstName = $firstName;
        }
    
        /**
         * Get the last name of the person.
         *
         * @return string
         *  Last name.
         * @since 1.0
         * @version 1.0
         */
        public function getLastName() {
            return $this->_lastName;
        }
    
        /**
         * Set the last name of the person.
         *
         * @param mixed $lastName
         *  New last name.
         * @since 1.0
         * @version 1.0
         */
        public function setLastName($lastName) {
            $this->_lastName = $lastName;
        }
        
        
    }
