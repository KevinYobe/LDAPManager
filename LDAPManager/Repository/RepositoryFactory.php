<?php
namespace Repository;

use Exception\ClassNotFoundException;

class RepositoryFactory
{
    
    

    public function __construct()
    {
        
    }
    
    public function getRepository($repositoryName) {
        if(class_exists($repositoryName)){
           return new $repositoryName(); 
        }
        else {
            throw new ClassNotFoundException("Class".$repositoryName."was not found");
        }
    }
}

