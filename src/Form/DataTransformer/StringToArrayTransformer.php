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
    
    namespace MediaClient\Form\DataTransformer;
    
    use Symfony\Component\Form\DataTransformerInterface;

    class StringToArrayTransformer implements DataTransformerInterface {
    
        /**
         * Delimiter used to separate each element of string and array.
         *
         * @var string
         */
        private $_delimiter = ', ';
        
    
        /**
         * Convert an array into a string.
         *
         * @param array $array
         *  The array at convert into string.
         * @return string
         *  The string representation of the array.
         * @since 1.0
         * @version 1.0
         */
        public function transform($array) {
            if (empty($array)) {
                return '';
            }
            
            return implode($this->_delimiter, $array);
        }
    
        /**
         * Convert a string into an array.
         *
         * @param string $string
         *  The string at convert.
         * @return array
         *  The array representation of the string.
         * @since
         * @version 1.0
         */
        public function reverseTransform($string) {
            if (!$string) {
                return array();
            }
    
            return explode($this->_delimiter, $string);
        }
    }
