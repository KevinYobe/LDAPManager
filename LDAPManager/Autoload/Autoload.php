<?php
namespace Autoload{
    
class Autoload
{
    
    public function __construct()
    {  
        set_include_path('C:\xampp\htdocs\passwordmanager2');
        spl_autoload_register(function ($class)
        {    
            
            include_once $class.'.php';
        });
        
       
    }
    
    
}
}
