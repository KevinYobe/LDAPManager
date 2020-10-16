<?php
namespace Autoload{
    
class Autoload
{
    
    public function __construct()
    {  
        set_include_path('C:\Users\KYobe\git\LDAPManager\LDAPManager');
        spl_autoload_register(function ($class)
        {    
            
            include_once $class.'.php';
        });
        
       
    }
    
    
}
}
