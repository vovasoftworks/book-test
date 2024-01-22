<?php

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response;

class IncorrectMoneyAmountException extends Exception
{
    public function __construct()
    {
        parent::__construct("Incorrect money amount", Response::HTTP_FORBIDDEN);
    }
}
