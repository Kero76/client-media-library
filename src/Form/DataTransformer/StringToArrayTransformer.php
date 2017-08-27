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
         *
         * @return string
         *  The string representation of the array.
         * @since 1.0
         * @version 1.0
         */
        public function transform($array) {
            if (empty($array) or is_null($array)) {
                return '';
            }

            $str_return = '';
            // Loop on main array composed all data present as array.
            foreach ($array as $item) {
                // If the item is an array, the item is composed by some another data (see Person / Company).
                if (is_array($item) === true) {
                    // Loop on each attributes of companies or persons.
                    foreach ($item as $key => $value) {
                        // If key equals name of last name, concat it with current string return value.
                        if ($key === 'name' || $key === 'lastName') {
                            $str_return .= $item[$key] . ', ';
                        }

                        // If key equals first name, it must be concat with last name before add comma.
                        if ($key == 'firstName') {
                            $str_return .= $item[$key] . ' ';
                        }
                    }
                } else {
                    // Implode simple data like platform, languages, subtitles, ...
                    return implode($this->_delimiter, $array);
                }
            }

            // Cut the 2 last character from the string to remove ', ' and display result.
            return substr($str_return, 0, -2);
        }

        /**
         * Convert a string into an array.
         *
         * @param string $string
         *  The string at convert.
         *
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
