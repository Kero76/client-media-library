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
    
    namespace MediaClient\Form\Inscription;

    /**
     * Class InscriptionEntity
     *
     * @author Nicolas GILLE
     * @package MediaClient\Form\Inscription
     * @since 1.0
     * @version 1.0
     */
    class InscriptionEntity {
    
        /**
         * Username get from form.
         *
         * @var string
         */
        private $_username = "";
    
        /**
         * Password get from form.
         *
         * @var string
         */
        private $_password = "";
    
        /**
         * Email get from form.
         *
         * @var string
         */
        private $_email = "";
    
        /**
         * Get the username from the entity.
         *
         * @return string
         *  The username.
         * @since 1.0
         * @version 1.0
         */
        public function getUsername(): string {
            return $this->_username;
        }
    
        /**
         * Set the username of the entity.
         *
         * @param string $username
         *  New username.
         * @since 1.0
         * @version 1.0
         */
        public function setUsername(string $username) {
            $this->_username = $username;
        }
    
        /**
         * Get the password from the entity.
         *
         * @return string
         *  The password.
         * @since 1.0
         * @version 1.0
         */
        public function getPassword(): string {
            return $this->_password;
        }
    
        /**
         * Set the password of the entity.
         *
         * @param string $password
         *  New password.
         * @since 1.0
         * @version 1.0
         */
        public function setPassword(string $password) {
            $this->_password = $password;
        }
    
        /**
         * Get the email address for the entity.
         *
         * @return string
         *  The email address.
         * @since 1.0
         * @version 1.0
         */
        public function getEmail(): string {
            return $this->_email;
        }
    
        /**
         * Set the email address for the entity.
         *
         * @param string $email
         *  New email address get from form.
         * @since 1.0
         * @version 1.0
         */
        public function setEmail(string $email) {
            $this->_email = $email;
        }
    }
