<?php

namespace App\JDR\Exception;

use Exception;

class LancerException extends Exception
{
    public function __construct(string $message)
    {
        parent::__construct($message);
    }
}