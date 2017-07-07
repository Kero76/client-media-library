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
    
    namespace MediaClientTest\Tests\Rest;
    
    use MediaClient\Http\HttpCodeStatus;
    use MediaClient\Rest\RestClient;
    use PHPUnit\Framework\TestCase;

    /**
     * Class RestClientTest used to execute unit test for class RestClient.
     *
     * @author Nicolas GILLE
     * @package MediaClientTest\Tests\Rest
     * @since
     * @version 1.0
     */
    class RestClientTest extends TestCase {
        
        public function testGetAllAnimes() {
            // Given - Instantiate client and uri.
            $client = new RestClient();
            $uri = "animes/";
            $sizeExpected = 43;
            
            // When - Execute request.
            $result = $client->get($uri);
            
            // Then - Display result
            $this->assertEquals(count($result), $sizeExpected);
        }
        
        public function testGetAllMovies() {
            // Given - Instantiate client and uri.
            $client = new RestClient();
            $uri = "movies/";
            $sizeExpected = 361;
            
            // When - Execute request.
            $result = $client->get($uri);
            
            // Then - Display result
            $this->assertEquals(count($result), $sizeExpected);
        }
        
        public function testGetAllCartoons() {
            // Given - Instantiate client and uri.
            $client = new RestClient();
            $uri = "cartoons/";
            $sizeExpected = 75;
            
            // When - Execute request.
            $result = $client->get($uri);
            
            // Then - Display result
            $this->assertEquals(count($result), $sizeExpected);
        }
        
        public function testGetAllSeries() {
            // Given - Instantiate client and uri.
            $client = new RestClient();
            $uri = "series/";
            $sizeExpected = 73;
            
            // When - Execute request.
            $result = $client->get($uri);
            
            // Then - Display result
            $this->assertEquals(count($result), $sizeExpected);
        }
        
        public function testGetOneAnime(){
            // Given - Instantiate client and uri.
            $client = new RestClient();
            $uri = "animes/search/id/1";
            $idExpected    = 1;
            $titleExpected = "Scooby-Doo : Mystères associés";
            
            // When - Execute request.
            $result = $client->get($uri);

            // Then - Check result.
            $this->assertEquals($result['id'], $idExpected);
            $this->assertEquals($result['title'], $titleExpected);
        }

        public function testGetMovieAndGet204Error() {
            // Given - Instantiate client and uri.
            $client = new RestClient();
            $uri = "movies/search/id/1";
            $codeErrorExcepted = HttpCodeStatus::NO_CONTENT()->getValue();
            $messageExpected   = "No content found.";

            // When - Execute request.
            $result = $client->get($uri);

            // Then - Check result.
            $this->assertEquals($result['message'], $messageExpected);
            $this->assertEquals($result['code_error'], $codeErrorExcepted);
        }
        
        public function testPostMovie() {
            // Given - Instantiate Movie at insert, uri at request.
            $client = new RestClient();
            $uri = "movies/";
            
            $actors = array(
                array(
                    "firstName" => "Jacky",
                    "lastName"  => "La Frite",
                ),
                array(
                    "firstName" => "Osiris",
                    "lastName"  => "La Saucisse",
                ),
            );
            
            $producers = array(
                array(
                    "firstName" => "Nicolas",
                    "lastName"  => "GILLE",
                ),
            );
            
            $directors = array(
                array(
                    "firstName" => "Nicolas",
                    "lastName"  => "GILLE",
                ),
            );
            
            $movieData = array(
                "title" => "Mon Film",
                "originalTitle" => "My Movie",
                "synopsis" => "This is a super movie !",
                "mainActors" => $actors,
                "directors" => $directors,
                "producers" => $producers,
                "genres" => array("ACTION", "ADVENTURE", "COMEDY"),
                "supports" => array("DIGITAL", "DVD"),
                "languageSpoken" => array("fr", "en"),
                "subtitles" => array("fr", "en", "de", "es", "nl"),
                "releaseDate" => "1499427234255",
                "runtime" => 123,
            );
            $movie = \GuzzleHttp\json_encode($movieData);

            // When - Execute request.
            $result = $client->post($uri, $movie);

            // Then - Check result.
            $this->assertTrue($result);
        }
        
        public function testDeleteMovie() {
            // Given - Instantiate client, uri, and expected result.
            $client = new RestClient();
            $id = $client->get("movies/search/title/Mon Film")['id'];
            $uri = "movies/" . $id;
            
            // When - Execute request.
            $result = $client->delete($uri);
            
            // Then - Check result.
            $this->assertTrue($result);
        }
    }
