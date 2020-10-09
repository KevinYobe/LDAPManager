<?php
namespace LDAP;

use Config\LDAPConfig;
use Utils\DateTimeUtils;
use Utils\SearchFilter;


class LDAPUtils
{
    
    private $sr; 
    private $filterWith;
    private $searchObject;
    private $entry;
    private $attribute; 
    private $search;
    private $utils;
    private $searchAttribute; 
    
    public function __construct($filterWith, $searchObject, $attributes = array())
    {
        
        $this->filterWith = $filterWith;
        $this->searchObject = $searchObject;
        $this->searchAttribute = $attributes;  
        $this->search = new LDAPSearch( $this->filterWith,$this->searchObject, $this->searchAttribute);
        $this->sr = $this->search->search();
        $this->entry = $this->search->getFirstEntry();
        $this->utils = new DateTimeUtils();
        
       
    }
    
    public function getUsername(){
        $this->attribute = 'sAMAccountName';
        $username =  $this->search->getAttribute($this->attribute);
        return $username[0];
        
    }
    
    public function getLastLogin() {
        $lastlogon = $this->search->getAttribute('lastLogonTimestamp');
        return DateTimeUtils::convertToHumanTimestamps($lastlogon[0]);
    }
    
    public function isAdministrator() {
       $this->attribute = 'sAMAccountType';
       $isadmin = $this->search->getAttribute($this->attribute);
       return $isadmin;
    }
    
    public function getMemberDN(){
        $this->attribute = 'distinguishedName';
        $dn = $this->search->getAttribute($this->attribute);
        return $dn[0];
    }
    
    public function getDateCreated() {
        $this->attribute = 'whenCreated';
        $created = $this->search->getAttribute($this->attribute);
        return $created[0];
    }
    
    public function memberOf(){
        $this->attribute = 'memberOf';
        $memberof = $this->search->getAttribute($this->attribute);
        return $memberof;
    }
    
    public function getLasModifiedDate() {
        $this->attribute = 'whenChanged';
        $modifieddate = $this->search->getAttribute($this->attribute);
        return DateTimeUtils::convertToHumanTimestamps($modifieddate);
    }
    
    public function getSAMAccountName() {
        $this->attribute = 'sAMAccountName';
        $samaccountname = $this->search->getAttribute($this->attribute);
        return $samaccountname[0];
    }
    
    public function getObjetType() {
        $this->attribute = 'objectClass';
        $objectClass =  $this->search->getAttribute($this->attribute);
        return $objectClass[0];   
    }
    
    public function getLastLogoff() {
        $this->attribute = 'lastlogoff';
        $lastlogoff = $this->search-getAttribute($this->attribute);
        return DateTimeUtils::convertToHumanTimestamps($lastlogoff);
    }
    
    public function getLastLogon() {
        $this->attribute = 'lastlogon';
        $lastlogon = $this->search-getAttribute($this->attribute);
        return DateTimeUtils::convertToHumanTimestamps($lastlogon);
    }
    
    public function getPasswordExpiry() {
        $this->attribute = 'msDS-UserPasswordExpiryTimeComputed';
        $attribute = $this->search->getAttribute($this->attribute);
        return DateTimeUtils::convertToHumanTimestamps($attribute[0]);
        
    }
    
    public function getPasswordLastReset(){
        $this->attribute = 'pwdLastSet';
        $last_reset =  $this->search->getAttribute($this->attribute);
        return DateTimeUtils::convertToHumanTimestamps($last_reset[0]);
    }
    
    public function getPasswordMaxAge(){
        
    }
    
    public function isAdmin(){
        $this->attribute = 'adminCount';
        $admin_count =  $this->search->getAttribute($this->attribute);
        return $admin_count;
    }
    public function getCommonName(){
        $this->attribute = 'cn';
        $cn =  $this->search->getAttribute($this->attribute);
        return $cn;
    }
    public function getLogonCount() {
        $this->attribute = 'logonCount';
        $logonCount =  $this->search->getAttribute($this->attribute);
        return $logonCount[0];
    }
    
    public function samAccountType() {
        $this->attribute = 'sAMAccountType';
        $samaccounttype =  $this->search->getAttribute($this->attribute);
        return $samaccounttype[0];
    }
    
    public function userPrincipalName() {
        $this->attribute = 'userPrincipalName';
        $userPrincipalName =  $this->search->getAttribute($this->attribute);
        return $userPrincipalName[0];
    }
    
    public function getEmail(){
        $this->attribute = 'mail';
        $mail =  $this->search->getAttribute($this->attribute);
        return $mail[0];
    }
    
    public function getDescription() {
        $this->attribute = 'description';
        $descritption =  $this->search->getAttribute($this->attribute);
        return $descritption[0];
    }
    
    public function isLocked(){
        $this->attribute = 'useraccountcontrol';
        $accountCtrl = $this->search->getAttribute($this->attribute);
        return $accountCtrl;
    }
}

