<?php

namespace Jklzz02\RestApi\Exception\HTTPException;

use Throwable;

class HTTPNotFoundException extends \Exception
{
    public function __construct($message = "", $code = 0, Throwable $previous = null){
        parent::__construct($message, $code, $previous);
    }
}