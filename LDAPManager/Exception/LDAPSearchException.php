<?php
namespace Exception;

use Exception;

class LDAPSearchException extends \Exception
{

    public function __construct($message, $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code = 0, $previous);
    }
    
}

