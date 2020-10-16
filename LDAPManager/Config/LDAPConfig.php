<?php
namespace Config;

use PHLAK\Config\Config;

class LDAPConfig
{
    private  $path;
    
    private static  $cfg;
    
    public function __construct()
    {
        $path = 'C:\Users\KYobe\git\LDAPManager\LDAPManager\app.ini';
        self::$cfg = new Config($path);
    }
    
    
    
    public static function getUsername(){
        return self::$cfg->get('username');
    }
    
    public static function getPassword(){
        return self::$cfg->get('password');
    }
    
    public static function getDN(){
        return self::$cfg->get('dn');
    }
    
    public static function getLDAPServer() {
        return self::$cfg->get('ldapserver');
    }
}

