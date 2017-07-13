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
    
    namespace MediaClient\Model\Book;
    use MediaClient\Model\AbstractMedia;

    /**
     * Class Book.
     *
     * @author Nicolas GILLE
     * @package MediaClient\Model\Book
     * @since 1.0
     * @version 1.0
     */
    class Book extends AbstractMedia {
    
        /**
         * @var string
         */
        protected $_isbn;
        
        /**
         * @var string
         */
        protected $_originalTitle;
    
        /**
         * @var int
         */
        protected $_nbPages;
    
        /**
         * @var array
         */
        protected $_authors;
    
        /**
         * @var array
         */
        protected $_publishers;
    
        /**
         * @var string
         */
        protected $_format;
    
        /**
         * Book constructor.
         *
         * @param array $data
         *  All data of the book.
         * @since 1.0
         * @version 1.0
         */
        public function __construct(array $data) {
            $this->hydrate($data);
        }
    
        /**
         * @return string
         */
        public function getIsbn(): string {
            return $this->_isbn;
        }
    
        /**
         * @param string $isbn
         */
        public function setIsbn(string $isbn) {
            $this->_isbn = $isbn;
        }
    
        /**
         * @return string
         */
        public function getOriginalTitle(): string {
            return $this->_originalTitle;
        }
    
        /**
         * @param string $originalTitle
         */
        public function setOriginalTitle(string $originalTitle) {
            $this->_originalTitle = $originalTitle;
        }
    
        /**
         * @return int
         */
        public function getNbPages(): int {
            return $this->_nbPages;
        }
    
        /**
         * @param int $nbPages
         */
        public function setNbPages(int $nbPages) {
            $this->_nbPages = $nbPages;
        }
    
        /**
         * @return array
         */
        public function getAuthors(): array {
            return $this->_authors;
        }
    
        /**
         * @param array $authors
         */
        public function setAuthors(array $authors) {
            $this->_authors = $authors;
        }
    
        /**
         * @return array
         */
        public function getPublishers(): array {
            return $this->_publishers;
        }
    
        /**
         * @param array $publishers
         */
        public function setPublishers(array $publishers) {
            $this->_publishers = $publishers;
        }
    
        /**
         * @return string
         */
        public function getFormat(): string {
            return $this->_format;
        }
    
        /**
         * @param string $format
         */
        public function setFormat(string $format) {
            $this->_format = $format;
        }
    }
