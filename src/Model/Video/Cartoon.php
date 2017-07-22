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
    
    namespace MediaClient\Model\Video;

    /**
     * Class Cartoon.
     *
     * @author Nicolas GILLE
     * @package MediaClient\Model\Video
     * @since 1.0
     * @version 1.0
     */
    class Cartoon extends AbstractVideo {
    
        /**
         * Runtime of the cartoon.
         *
         * @var integer
         */
        protected $_runtime;
    
        /**
         * Cartoon constructor.
         *
         * @param array $data
         *  All data of the cartoon.
         * @since 1.0
         * @version 1.0
         */
        public function __construct(array $data) {
            $this->hydrate($data);
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
    }
