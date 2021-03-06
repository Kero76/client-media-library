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

    declare(strict_types=1);

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
         * @param \MediaClient\User\User $user
         *  User to register on Database.
         *
         * @since 1.0
         * @version 1.0
         */
        public function save(User $user) {
            $userData = array(
                'usr_name' => $user->getUsername(),
                'usr_mail' => $user->getEmail(),
                'usr_password' => $user->getPassword(),
                'usr_salt' => $user->getSalt(),
                'usr_role' => $user->getRole(),
            );

            // Update user previously register on system.
            if ($user->getId() !== -1) {
                // The user has already been saved : update it
                $this->getDb()
                     ->update('mc_users', $userData, array('usr_id' => $user->getId()));
            } else {
                // The user has never been saved : insert it
                $this->getDb()
                     ->insert('mc_users', $userData);
                // Get the id of the newly created user and set it on the entity.
                $id =
                    $this->getDb()
                         ->lastInsertId();
                $user->setId(intval($id));
            }
        }

        /**
         * Get user by id.
         *
         * @param $id
         *  Identifier of the user at search.
         *
         * @return \MediaClient\User\User|mixed
         *  Return the User corresponding to the id.
         * @throws \Exception
         *  It throw when user not found with specific id.
         * @since 1.0
         * @version 1.0
         */
        public function find($id) {
            $sql = "SELECT * FROM mc_users WHERE usr_id = ?";
            $row =
                $this->getDb()
                     ->fetchAssoc($sql, array($id));

            if ($row) {
                return $this->buildObject($row);
            } else {
                throw new \Exception("No user matching id " . $id);
            }
        }

        /**
         * @inheritdoc
         */
        public function loadUserByUsername($username) {
            $sql = "SELECT * FROM mc_users WHERE usr_name = ?";
            $row =
                $this->getDb()
                     ->fetchAssoc($sql, array($username));

            if ($row) {
                return $this->buildObject($row);
            } else {
                throw new UsernameNotFoundException(sprintf('User "%s" not found.', $username));
            }
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
            $user = new User();
            $user->setId(intval($data['usr_id']));
            $user->setEmail($data['usr_mail']);
            $user->setUsername($data['usr_name']);
            $user->setPassword($data['usr_password']);
            $user->setSalt($data['usr_salt']);
            $user->setRole($data['usr_role']);

            return $user;
        }
    }
