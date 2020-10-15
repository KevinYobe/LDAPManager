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
new Autoload();
//$searchUsers = new LDAPConnection();



$userRepository = "UserRepository";
$repository = new RepositoryFactory();
$user = $repository->getRepository($userRepository);

var_dump($repository);




