<?php
require_once 'Autoload/Autoload.php';


use Autoload\Autoload;
use Utils\SearchFilter;
use LDAP\LDAPSearch;
use LDAP\LDAPConnection;
use Config\LDAPConfig;
use Exception\LDAPSearchException;
use LDAP\LDAPUtils;
use Repository\RepositoryFactory;
use PHLAK\Config\Config;
new Autoload();
//$searchUsers = new LDAPConnection();

$cfg = new LDAPConfig();
$ldapserver = $cfg->getLDAPServer();
$username = $cfg->getUsername();
$password = $cfg->getPassword();
$dn = $cfg->getDN();

var_dump($username);
$ds = ldap_connect($ldapserver);

ldap_bind($ds, $username, $password);

$ldaprecord['cn'] = "Regina Thomas";
$ldaprecord['givenName'] = "rtomas";
$ldaprecord['sn'] = "Mutandasi";
$ldaprecord['objectclass'][0] = "top";
$ldaprecord['objectclass'][1] = "person";
$ldaprecord['objectclass'][2] = "organizationalPerson";
$ldaprecord['objectclass'][3] = "user";
$ldaprecord['sAMAccountName'] = "rtomas";
$ldaprecord['distinguishedname'] = "ou=Domain Users,dc=concept,dc=co,dc=zw";
$ldaprecord['mail'] = "lkl@fherffg.com";

$res = ldap_add($ds, $dn, $ldaprecord);

var_dump($res);


