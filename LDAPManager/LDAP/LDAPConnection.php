<?php

namespace LDAP;
use Config\LDAPConfig;

use Exception\LDAPException;
use Exception\LDAPAuthenticationException;
use Exception;

class LDAPConnection
{
    private static $instance; 
    private static $username; 
    private static $password; 
    private static $dn; 
    private static $ldapserver; 
    private static $ds;
    
    public function __construct()
    {
        //Parse configs from the INI file
        $cfg = new LDAPConfig();
        $ldapserver =$cfg::getLDAPServer();
        $dn = $cfg::getDN();
        $username = $cfg::getUsername();
        $password = $cfg::getPassword();
        
        //Initialize the connection properties
        var_dump($ldapserver);
        self::$ldapserver = $ldapserver;
        self::$dn = $dn; 
        self::$username = $username;
        self::$password = $password;
        self::$ds = ldap_connect($ldapserver);
    }
    
    /*Connet to the LDAP Server and return the connection whenever required*/
    public static function connect(){
       // var_dump(self::$ds);
        return self::$ds;
    }
    
    /*Get a connection (bind) to the LDAP server and return it whenever required*/
    public  static function getConnection() {
        
        if (self::$ds) {
            
            return ldap_bind(self::$ds, self::$username, self::$password);
        }
        
        else {
           
            throw new LDAPAuthenticationException(ldap_error(self::$ds));
            return null;
        }
        
        }
        
    
    
    /*Check if we have a valid connection to the LDAP Server*/
    public static function isConnected(){
        
        if (self::getConnection()) {
            return true;
        }
        
        return false;
    }
    
    /*Disconnect from the LDAP Server and free up resources*/
    public  static function disconnect(){
        //First close the ldap_connect, and then close ldap_bind
        if(ldap_connect(self::$ds)){
            ldap_close(self::$ds); 
           
        }
        if (ldap_bind(self::$ds)) {
            ldap_unbind(self::$ds);
        }
        
    }
    
    /*Singleton. Get an instance of this class*/
    public static function getInstance(){
      return  new LDAPConnection(); 
    }
}

