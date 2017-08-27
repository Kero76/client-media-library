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

    namespace MediaClient\Utils;

    /**
     * Class Pagination.
     *
     * @author Nicolas GILLE
     * @package MediaClient\Utils
     * @since 1.0
     * @version 1.0
     */
    class Pagination {

        /**
         * Contains the number of elements present on the pagination.
         *
         * @var int
         */
        public static $ELEMENTS_DISPLAYED = 10;

        /**
         * Start of the pagination element at display.
         *
         * @pre
         *  0 <= getStart() <= getSize() - $ELEMENTS_DISPLAYED
         * @var int
         */
        private $start;

        /**
         * End of the pagination element at display.
         *
         * @pre
         *  getStart() - $ELEMENTS_DISPLAYED - 1 <= getEnd() <= getSize()
         * @var int
         */
        private $end;

        /**
         * Current position on the pagination.
         *
         * @pre
         *  getStart() <= getActive() <= getSize()
         * @var int
         */
        private $active;

        /**
         * Max elements on pagination.
         * It's represent by the array of data at display divide by $ELEMENTS_DISPLAYED.
         *
         * @pre
         *  getSize() > 0
         * @var int
         */
        private $size;

        /**
         * Pagination constructor.
         *
         * @param int $active
         *  Current element select by the user.
         * @param int $size
         *  Size of the array of data at displayed on the view.
         *
         * @since 1.0
         * @version 1.0
         */
        public function __construct(int $active, int $size) {
            $this->active = $active;
            $this->size = intval(floor($size / Pagination::$ELEMENTS_DISPLAYED));
            // Compute the start of the pagination to divide active element by 10 to get the interval at displayed.
            $this->start = intval(floor($active / 10) * Pagination::$ELEMENTS_DISPLAYED);
            $this->end = $this->start + Pagination::$ELEMENTS_DISPLAYED - 1;
            // Adapt end value if necessary because the maximum value of end is size.
            if ($this->end > $this->size) {
                $this->end = $this->size;
                // The start could'nt be negative.
                if ($this->end > Pagination::$ELEMENTS_DISPLAYED) {
                    $this->start = $this->end - Pagination::$ELEMENTS_DISPLAYED + 1;
                } else {
                    $this->start = 0;
                }
            }
        }

        /**
         * Get the first element of the pagination at display.
         *
         * @return int
         *  Return the first element at display of the pagination.
         * @since 1.0
         * @version 1.0
         */
        public function getStart(): int {
            return $this->start;
        }

        /**
         * Get the last element of the pagination at display.
         *
         * @return int
         *  Return the last element at display of the pagination.
         * @since 1.0
         * @version 1.0
         */
        public function getEnd(): int {
            return $this->end;
        }

        /**
         * Get the current element of the pagination select by the user.
         *
         * @return int
         *  Return the current element selected by the user.
         * @since 1.0
         * @version 1.0
         */
        public function getActive(): int {
            return $this->active;
        }

        /**
         * Get the size of the pagination.
         *
         * @return int
         *  Return the size of the pagination.
         * @since 1.0
         * @version 1.0
         */
        public function getSize(): int {
            return $this->size;
        }
    }
