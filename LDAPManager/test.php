<?php
require_once 'Autoload/Autoload.php';


use Autoload\Autoload;
use Utils\SearchFilter;
use LDAP\LDAPSearch;
use LDAP\LDAPConnection;
use Config\LDAPConfig;
use Exception\LDAPSearchException;
use LDAP\LDAPUtils;
new Autoload();
//$searchUsers = new LDAPConnection();
$cfg = new LDAPConfig();


//$attribute = array('useraccountcontrol');

$filter = 'cn=';
$so = 'Kevin Yobe';

$sr = new LDAPUtils($filter, $so);
$rs = $sr->isLocked();

var_dump($rs);


//var_dump($entry);
