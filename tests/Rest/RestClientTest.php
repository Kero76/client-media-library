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
        
        public function testGetMedia(){
            // Given - Instantiate client and uri.
            $client = new RestClient();
            $uri = "animes/search/id/1";
            $mediaExpected = "{\"id\":1,\"title\":\"Scooby-Doo : Mystères associés\",\"synopsis\":\"\",\"releaseDate\":1270339200000,\"genres\":[\"MYSTERY\",\"COMEDY\",\"DRAMA\"],\"supports\":[\"DVD\"],\"originalTitle\":\"Scooby-Doo! Mystery Incorporated\",\"languagesSpoken\":[\"fr\",\"en\",\"es\",\"he\",\"pl\",\"cs\"],\"subtitles\":[\"fr\",\"en\",\"es\",\"he\",\"pl\",\"cs\"],\"producers\":[{\"id\":4,\"firstName\":\"Spike\",\"lastName\":\"Brandt\",\"videos\":null},{\"id\":6,\"firstName\":\"Tony\",\"lastName\":\"Cervone\",\"videos\":null},{\"id\":8,\"firstName\":\"Luke\",\"lastName\":\"Briers\",\"videos\":null},{\"id\":3,\"firstName\":\"Mitch\",\"lastName\":\"Watson\",\"videos\":null},{\"id\":2,\"firstName\":\"Victor\",\"lastName\":\"Cook\",\"videos\":null},{\"id\":7,\"firstName\":\"Finn\",\"lastName\":\"Arnesen\",\"videos\":null},{\"id\":1,\"firstName\":\"Jay\",\"lastName\":\"Bastian\",\"videos\":null},{\"id\":5,\"firstName\":\"Sam\",\"lastName\":\"Register\",\"videos\":null},{\"id\":9,\"firstName\":\"Tina\",\"lastName\":\"McCann\",\"videos\":null}],\"directors\":[{\"id\":11,\"firstName\":\"Victor\",\"lastName\":\"Cook\",\"videos\":null},{\"id\":10,\"firstName\":\"Curt\",\"lastName\":\"Geda\",\"videos\":null}],\"numberOfSeasons\":2,\"currentSeason\":1,\"endDate\":1365033600000,\"averageEpisodeRuntime\":22,\"numberOfEpisode\":26,\"maxEpisodes\":52}";
            
            // When - Execute request.
            $result = $client->getMedia($uri);
            
            // Then - Check result.
            $this->assertEquals($result, $mediaExpected);
        }
    
        public function testGetMediaAndGet204Error() {
            // Given - Instantiate client and uri.
            $client = new RestClient();
            $uri = "movies/search/id/1";
            $mediaExpected = "No content found.";
        
            // When - Execute request.
            $result = $client->getMedia($uri);
        
            // Then - Check result.
            $this->assertEquals($result, $mediaExpected);
        }
    }
