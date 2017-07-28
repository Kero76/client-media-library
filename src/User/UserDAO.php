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

    use MediaClient\DAO\AbstractDAO;
    use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
    use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
    use Symfony\Component\Security\Core\User\UserInterface;
    use Symfony\Component\Security\Core\User\UserProviderInterface;

    /**
     * Class UserDAO extends AbstractDAO.
     *
     * It must override the method buildObject to create an user thanks to the row get from Database.
     *
     * @author Nicolas GILLE
     * @package MediaClient\User
     * @since 1.0
     * @version 1.0
     */
    class UserDAO extends AbstractDAO implements UserProviderInterface {
    
        /**
         * @inheritdoc
         */
        public function loadUserByUsername($username) {
            $sql = "SELECT * FROM users WHERE username = ?";
            $row = $this->getDb()->fetchAssoc($sql, array($username));
    
            if ($row)
                return $this->buildObject($row);
            else
                throw new UsernameNotFoundException(sprintf('User "%s" not found.', $username));
        }
    
        /**
         * @inheritdoc
         */
        public function refreshUser(UserInterface $user) {
            $class = get_class($user);
            if (!$this->supportsClass($class)) {
                throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', $class));
            }
            return $this->loadUserByUsername($user->getUsername());
        }
    
        /**
         * @inheritdoc
         */
        public function supportsClass($class) {
            return 'MediaClient\User\User' === $class;
        }
        
        /**
         * @inheritdoc
         */
        protected function buildObject(array $data) {
            $user = new User($data);
            return $user;
        }
    }
