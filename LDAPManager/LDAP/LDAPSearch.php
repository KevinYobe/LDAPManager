<?php
namespace LDAP;

//use PHLAK\Config\Config;
use Config\LDAPConfig;
use Utils\SearchFilter;
use Exception\LDAPConnectionException;
use LDAP\LDAPConnection;

class LDAPSearch
{
    private $connect; 
    private $connection; 
    private $dn;
    private $filterWith;
    private $searchObject;
    private $attributes; 
    
    public function __construct($filterWith, $searchObject, $attributes = array())
    {
        
        new LDAPConnection();
        $cfg = new LDAPConfig();
        $this->connect = LDAPConnection::connect();
        $this->dn = $cfg->getDN(); 
        $this->filterWith = $filterWith;
        $this->searchObject = $searchObject;
        if (isset($attributes))
            $this->attributes = $attributes;
 
        
    }
    
    
    
    
    
    public function search(){
        
        $filter = $this->filterWith."".$this->searchObject;
        
        try {
            //LDAPConnection::getConnection();
            return ldap_search($this->connect,$this->dn,$filter, $this->attributes);
        } catch (LDAPConnectionException $e) {
            $e->getMessage();
        }
        
    }
    
    public  function getFirstEntry(){
        $sr = $this->search();
        
        return ldap_first_entry(LDAPConnection::connect(), $sr);
    }
    
    public function searchByObjectClass($objectClass) {
        
    }
    
    
    public function searchByAttributes($attributes){
        
    }
    
    
    public  function getAttributes(){
        $first_entry = $this->getFirstEntry();
        $attributes = ldap_get_attributes(LDAPConnection::connect(), $first_entry);
        return $attributes;
    }
    
    public function getAttribute($attributeName){
        $attributes = $this->getAttributes();
        return $attributes[$attributeName];
    }
  
    public function filterResults(){
        
    }
    
    
}

