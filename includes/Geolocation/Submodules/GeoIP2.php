<?php

namespace ModulesGarden\Geolocation\Submodules;

use GeoIp2\Database\Reader;
/**
 * Submodule GeoIP2
 */
class GeoIP2 {
    /**
     * getCountry return ISO 3166-1 Country Code (Alpha-2) by IP
     */
    public function getCountry() {    
        if(!file_exists(dirname(__FILE__).DIRECTORY_SEPARATOR."GeoIP2".DIRECTORY_SEPARATOR."geoip2.phar"))
        {
            throw new \Exception('geoip2.phar file not found.');
        }
        if(!file_exists(dirname(__FILE__).DIRECTORY_SEPARATOR."GeoIP2".DIRECTORY_SEPARATOR."GeoLite2-Country.mmdb"))
        {
            throw new \Exception('GeoLite2-Country.mmdb file not found.');
        }
        require_once dirname(__FILE__).DIRECTORY_SEPARATOR."GeoIP2".DIRECTORY_SEPARATOR."geoip2.phar";

        $reader = new Reader(dirname(__FILE__).DIRECTORY_SEPARATOR.'GeoIP2'.DIRECTORY_SEPARATOR.'GeoLite2-Country.mmdb');
        $record = $reader->country($_SERVER['REMOTE_ADDR']);
        
        return $record->country->isoCode;
    }
}
