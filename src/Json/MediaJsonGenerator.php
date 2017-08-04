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
    
    namespace MediaClient\Json;
    
    use MediaClient\Model\Media;
    use ReflectionClass;
    use ReflectionMethod;

    /**
     * Class MediaJsonGenerator.
     *
     * This class convert an object into a JSON object representation.
     * In fact, because all attributes present on Media object are private, method json_encode cannot work correctly.
     * So, this object build automatically the json representation of any object send on parameter.
     *
     * @author Nicolas GILLE
     * @package MediaClient\Json
     * @since 1.0
     * @version 1.0
     */
    class MediaJsonGenerator {
    
        /**
         * JSON representation of the media.
         *
         * @var string
         */
        private $_json;
    
        /**
         * MediaJsonGenerator constructor.
         *
         * @param \MediaClient\Model\Media $media
         *  Media object at convert into json format.
         * @since 1.0
         * @version 1.0
         */
        public function __construct(Media $media) {
            $this->_json = json_encode($this->objectToArray($media));
        }
    
        /**
         * Display the object on JSON format.
         *
         * @return string
         *  Return the json representation of Media.
         * @since 1.0
         * @version 1.0
         */
        public function __toString() : string {
            return $this->_json;
        }
    
        /**
         * Convert object into associative array representation.
         *
         * @param \MediaClient\Model\Media $object
         *  Object at convert.
         * @param int $recursionDepth
         *  Depth of recursion maximum. By default, the value is 2 object into main object.
         * @return array
         *  The representation of object in associative array.
         * @since 1.0
         * @version 1.0
         */
        public function objectToArray(Media $object, $recursionDepth = 2) : array {
            $result = array();
            $class = new ReflectionClass(get_class($object));
            foreach ($class->getMethods(ReflectionMethod::IS_PUBLIC) as $method) {
                $methodName = $method->name;
                if (strpos($methodName, "get") === 0 && strlen($methodName) > 3) {
                    $propertyName = lcfirst(substr($methodName, 3));
                    $value = $method->invoke($object);
                    $result[$propertyName] = $value;
                }
            }
            
            return $result;
        }
    }
