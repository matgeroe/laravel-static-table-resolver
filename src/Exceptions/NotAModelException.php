<?php

namespace MatthiasWilbrink\TableResolver\Exceptions;

use Exception;

class NotAModelException extends Exception
{
    public function __construct()
    {
        parent::__construct("Method resolveTable() called on a class that is not a Eloquent Model!", 0, null);
    }
}