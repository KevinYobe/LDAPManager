<?php
namespace Repository;

use LDAP\LDAPSearch;
use Exception\LDAPSearchException;
use LDAP\LDAPUser;

class UserRepository implements Repository
{
    
    
    private $user;
    public function __construct()
    {
        $this->user = new LDAPUser();
    }

    public function getObject($username)
    {
        $filterWith = '(&(|(objectclass=user)(objectclass=person)(objectclass=inetOrgPerson) (objectclass=organizationalPerson))(!(objectclass=computer)))';
        $searchObject = $username;
        try {
            $search = new LDAPSearch($filterWith, $searchObject);
            
        } catch (LDAPSearchException $e) {
            $e->getMessage();
        }
        return $search;
    }
    
    

    public function setObject()
    {
        
    }
    
    
    public function getAll()
    {
        
        $filterWith = '(&(|(objectclass=user)(objectclass=person)(objectclass=inetOrgPerson) (objectclass=organizationalPerson))(!(objectclass=computer)))';
        $searchObject = '*';
        try {
            $search = new LDAPSearch($filterWith, $searchObject);
            
        } catch (LDAPSearchException $e) {
            $e->getMessage();
        }
        return $search;
        
    }

    public function getbyCN($cn)
    {
        
        $filterWith = 'cn=';
        $searchObject= '*';
            
        $searchObject = '*';
        try {
            $search = new LDAPSearch($filterWith, $searchObject);
            
        } catch (LDAPSearchException $e) {
            $e->getMessage();
        }
        return $search;
        
    }
    
    public function getUserAttributes($username){
        
        $filterWith = 'sAMAccountName=';
        $searchObject = $username;
            
        $search = new LDAPSearch($filterWith, $searchObject);
        $search->getAttributes();
        
    }

    public function saveObject()
    {
        
    }

}

