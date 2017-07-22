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
         * ISBN of the book.
         *
         * @var string
         */
        protected $_isbn;
        
        /**
         * Original title of the book.
         *
         * @var string
         */
        protected $_originalTitle;
    
        /**
         * Number of pages present on the book.
         *
         * @var int
         */
        protected $_nbPages;
    
        /**
         * List of authors who writing book.
         * @var array
         */
        protected $_authors;
    
        /**
         * List of publishers who publishing the book.
         *
         * @var array
         */
        protected $_publishers;
    
        /**
         * Format of the book.
         *
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
         * Get the ISBN.
         *
         * @return string
         *  The ISBN of the book.
         * @since 1.0
         * @version 1.0
         */
        public function getIsbn(): string {
            return $this->_isbn;
        }
    
        /**
         * Set the ISBN of the book.
         *
         * @param string $isbn
         *  New ISBN of the book.
         * @since 1.0
         * @version 1.0
         */
        public function setIsbn(string $isbn) {
            $this->_isbn = $isbn;
        }
    
        /**
         * Get the original title of the book.
         *
         * @return string
         *  The original title of the book.
         * @since 1.0
         * @version 1.0
         */
        public function getOriginalTitle(): string {
            return $this->_originalTitle;
        }
    
        /**
         * Set the original title of the book.
         *
         * @param string $originalTitle
         *  New original title of the book.
         * @since 1.0
         * @version 1.0
         */
        public function setOriginalTitle(string $originalTitle) {
            $this->_originalTitle = $originalTitle;
        }
    
        /**
         * Get the number of pages on the book.
         *
         * @return int
         *  The number of pages on the book.
         * @since 1.0
         * @version 1.0
         */
        public function getNbPages(): int {
            return $this->_nbPages;
        }
    
        /**
         * Set the number of pages on the book.
         *
         * @param int $nbPages
         *  New number of pages of the book.
         * @since 1.0
         * @version 1.0
         */
        public function setNbPages(int $nbPages) {
            $this->_nbPages = $nbPages;
        }
    
        /**
         * Get the list of all authors of the book.
         *
         * @return array
         *  An array with all authors of the book.
         * @since 1.0
         * @version 1.0
         */
        public function getAuthors(): array {
            return $this->_authors;
        }
    
        /**
         * Set the authors of the book.
         *
         * @param array $authors
         *  New array of authors for the book.
         * @since 1.0
         * @version 1.0
         */
        public function setAuthors(array $authors) {
            $this->_authors = $authors;
        }
    
        /**
         * Get the list of publishers of the book.
         *
         * @return array
         *  The list of publishers.
         * @since 1.0
         * @version 1.0
         */
        public function getPublishers(): array {
            return $this->_publishers;
        }
    
        /**
         * Set the list of publishers.
         *
         * @param array $publishers
         *  New list of publishers.
         * @since 1.0
         * @version 1.0
         */
        public function setPublishers(array $publishers) {
            $this->_publishers = $publishers;
        }
    
        /**
         * Get the format of the book.
         *
         * @return string
         *  The format of the book.
         * @since 1.0
         * @version 1.0
         */
        public function getFormat(): string {
            return $this->_format;
        }
    
        /**
         * Set the format of the book.
         *
         * @param string $format
         *  The new format of the book.
         * @since 1.0
         * @version 1.0
         */
        public function setFormat(string $format) {
            $this->_format = $format;
        }
    }
