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
    namespace MediaClient\User;
    
    use Symfony\Component\Security\Core\User\UserInterface;

    /**
     * Class User.
     *
     * @author Nicolas GILLE
     * @package MediaClient\User
     * @since 1.0
     * @version 1.0
     */
    class User implements UserInterface {
    
        /**
         * Identifier of the user.
         *
         * @var integer
         */
        private $_id;
    
        /**
         * Username of the user.
         *
         * @var string
         */
        private $_username;
        
        /**
         * Email of the user.
         *
         * @var string
         */
        private $_email;
    
        /**
         * Password of the user.
         *
         * @var string
         */
        private $_password;
    
        /**
         * Salt to improve security of the app.
         *
         * @var string
         */
        private $_salt;
    
        /**
         * Role of the user :
         * <ul>
         *  <li>ROLE_USER</li>
         *  <li>ROLE_ADMIN</li>
         * </ul>
         *
         * @var string
         */
        private $_role;
    
        /**
         * User constructor.
         *
         * @param array $data
         *  Data get from Database.
         * @since 1.0
         * @version 1.0
         */
        public function __construct(array $data) {
            $this->hydrate($data);
        }
    
        /**
         * Return the id of the user.
         *
         * @return int
         *  Identifier of the user.
         * @since 1.0
         * @version 1.0
         */
        public function getId(): int {
            return $this->_id;
        }
    
        /**
         * Set the id of the user.
         *
         * @param int $id
         *  Identifier of the user.
         * @since 1.0
         * @version 1.0
         */
        public function setId(int $id) {
            $this->_id = $id;
        }
    
        /**
         * Get the role of the user.
         *
         * @return string
         *  Role of the user.
         * @since 1.0
         * @version 1.0
         */
        public function getRole(): string {
            return $this->_role;
        }
    
        /**
         * Set the role of the user.
         *
         * @param string $role
         *  New role of the user.
         * @since 1.0
         * @version 1.0
         */
        public function setRole(string $role) {
            $this->_role = $role;
        }
    
        /**
         * Get email of the user.
         *
         * @return string
         *  The email of the user.
         * @since 1.0
         * @version 1.0
         */
        public function getEmail(): string {
            return $this->_email;
        }
    
        /**
         * Set the mail of the user.
         *
         * @param string $email
         *  New email of the user.
         * @since 1.0
         * @version 1.0
         */
        public function setEmail(string $email) {
            $this->_email = $email;
        }
        
        /**
         * @inheritdoc
         */
        public function getRoles() {
            return array($this->getRoles());
        }
    
        /**
         * @inheritdoc
         */
        public function getPassword() {
            return $this->_password;
        }
    
        /**
         * @inheritdoc
         */
        public function getSalt() {
            return $this->_salt;
        }
    
        /**
         * @inheritdoc
         */
        public function getUsername() {
            return $this->_username;
        }
    
        /**
         * @inheritdoc
         */
        public function eraseCredentials() {
            // Nothing implementation for the moment.
        }
    
        /**
         * Method use for hydrate object directly thanks the data from the Database.
         *
         * @access private
         * @param array $data
         *  An array with all data from the Database.
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
