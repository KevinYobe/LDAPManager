<?php
namespace Utils;

class DateTimeUtils
{

    public function __construct()
    {}
    
    public static function convertToHumanTimestamps($timestamp) {
        
        $winSecs       = (int)($timestamp / 10000000); 
        $unixTimestamp = ($winSecs - 11644473600); 
        $timestamp = date(\DateTime::RFC1123, $unixTimestamp);
        return $timestamp;
    }
    
    public static function sanitizeLDAPPassssword($param) {
        ;
    }
    
    public static function sanitizeLDAPInput($param) {
        ;
    }
}

