<?php
namespace LDAP;
use LDAP\LDAP;

class LDAPUser
{
    private $name;
    private $username; 
    private $cn;
    private $surname;
    private $email;
    private $samacountname;
    private $dn;
    private $description;
    private $useraccountctrl;
    private $membership;
    private $ldap;
    private $filter;
    private $user;

    public function __construct($filter = '')
    {
        $this->filter = $filter;
      //  $this->user = $user;
        $this->ldap = new LDAP($this->filter, $this->user);
        
    }
    
    public function getName(){
        return $this->ldap->getCN();
    }
    
    public function setName($name){
        $this->name = $name;
    }
    
    public function getUsername() {
       //SamAccountName is the same as the username. 
       return $this->ldap->getSamaccountName(); 
    }
    
    public function setUsername($username){
        $this->username = $username;
    }
    
    public function getCommonName() {
        return $this->ldap->getCommonName();
    }
    
    public function setCommonName($cn) {
        $this->cn = $cn;
    }
    
    public function getSurname(){
        
    }
    
    public function setSurname($sn){
        $this->surname = $sn;
    }
    
    public function getSamacountName(){
        return $this->ldap->getSamaccountName();
    }
    
    public function setSamaccountname($samaccountname){
        $this->samacountname = $samaccountname;
    }
    
    public function getUserDN(){
        $this->attribute = 'distinguishedName';
        $dn = $this->search->getAttribute($this->attribute);
        return $dn[0];
    }
    
    public function setUserDN($dn){
        $this->dn = $dn;
    }
    
    public function getDescription(){
        return $this->ldap->getDescription();
    }
    
    public function setDescription($description){
        $this->descrption = $description;
    }
    
    public function getUserMembership(){
        return $this->ldap->getMemberShip();
    }
    
    public function setUserMemebrShip($membership){
      $this->membership = $membership;  
    }
    
    public function setPassword($password){
        $this->password = $password;
    }
    
    public function setEmail($email){
        $this->email = $email;
    }
    
    public function getEmail(){
        return $this->ldap->getEmail();
    }
    
    public function isLocked($username){
       
    }
    
    public function isDisabled($username){
        
    } 
    
    
}

