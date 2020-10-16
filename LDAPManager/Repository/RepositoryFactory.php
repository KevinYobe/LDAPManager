<?php
namespace Repository;

use Exception\ClassNotFoundException;

class RepositoryFactory
{
    
    

    public function __construct()
    {
        
    }
    
    public function getRepository($repositoryName) {
        
        $userRepository = 'UserRepository';
        $objectRepository = 'ObjectRepository';
        
        if(strcasecmp($repositoryName, $userRepository) == 0){
            return new UserRepository();
        }
        
        elseif (strcasecmp($repositoryName, $objectRepository)) {
            return new ObjectRepository();
        }
        
        else {
            throw new ClassNotFoundException("Class ".$repositoryName." was not found");
        }
    }
}

