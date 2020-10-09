<?php
namespace Utils;

class SearchFilter
{
    private $fitlerWith; 

    public function __construct()
    {
        
    }
    
    public function filtherWithsAMAccountName() {
        return $this->fitlerWith = 'sAMAccountName=';
    }
    
    public function filterWithCN() {
        return $this->fitlerWith = 'cn=';
    }
    
    public function filterByMembership() {
        return $this->fitlerWith = 'memberOf=';
    }
    
    public function filterbyUserMembership(){
        return $this->fitlerWith = '(&(objectCategory=Person)(sAMAccountName=*)(memberOf:1.2.840.113556.1.4.1941:=cn=CaptainPlanet,ou=users,dc=company,dc=com))';
    }
    
    public function to_string() {
        return strval($this->fitlerWith);
    }
}

