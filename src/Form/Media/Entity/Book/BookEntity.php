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

    namespace MediaClient\Form\Media\Entity\Book;

    use MediaClient\Form\Media\Entity\AbstractMediaEntity;
    use MediaClient\Model\Company;
    use MediaClient\Model\Person;

    /**
     * Class Book.
     *
     * @author Nicolas GILLE
     * @package MediaClient\Model\Book
     * @since 1.0
     * @version 1.0
     */
    class BookEntity extends AbstractMediaEntity {

        /**
         * ISBN of the book.
         *
         * @var string
         */
        protected $_isbn = '';

        /**
         * Original title of the book.
         *
         * @var string
         */
        protected $_originalTitle = '';

        /**
         * Number of pages present on the book.
         *
         * @var int
         */
        protected $_nbPages = -1;

        /**
         * List of authors who writing book.
         *
         * @var array
         */
        protected $_authors = array();

        /**
         * List of publishers who publishing the book.
         *
         * @var array
         */
        protected $_publishers = array();

        /**
         * Format of the book.
         *
         * @var string
         */
        protected $_format = '';

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
         *
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
         *
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
         *
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
            $authors = array();
            foreach ($this->_authors as $author) {
                $authors[] = new Person($author);
            }

            return $authors;
        }

        /**
         * Set the authors of the book.
         *
         * @param array $authors
         *  New array of authors for the book.
         *
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
            $publishers = array();
            foreach ($this->_publishers as $publisher) {
                $publishers[] = new Company($publisher);
            }

            return $publishers;
        }

        /**
         * Set the list of publishers.
         *
         * @param array $publishers
         *  New list of publishers.
         *
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
         *
         * @since 1.0
         * @version 1.0
         */
        public function setFormat(string $format) {
            $this->_format = $format;
        }

        /**
         * Get the json representation of the entity.
         *
         * @return string
         *  Return the json representation of the entity.
         * @since 1.0
         * @version 1.0
         */
        function getJson(): string {
            $publishers = array();
            foreach ($this->getPublishers() as $publisher) {
                $publishers[] = array(
                    'name' => $publisher->getName(),
                );
            }

            $authors = array();
            foreach ($this->getAuthors() as $author) {
                $authors[] = array(
                    'firstName' => $author->getFirstName(),
                    'lastName' => $author->getLastName(),
                );
            }

            $data = array(
                'id' => $this->getId(),
                'title' => $this->getTitle(),
                'originalTitle' => $this->getOriginalTitle(),
                'synopsis' => $this->getSynopsis(),
                'releaseDate' => $this->getReleaseDate()
                                      ->format('Y-m-d'),
                'genres' => array_map('strtoupper', $this->getGenres()),
                'supports' => array_map('strtoupper', $this->getSupports()),
                'isbn' => $this->getIsbn(),
                'nbPages' => $this->getNbPages(),
                'format' => strtoupper($this->getFormat()),
                'publishers' => $publishers,
                'authors' => $authors,
            );

            return json_encode($data);
        }
    }
