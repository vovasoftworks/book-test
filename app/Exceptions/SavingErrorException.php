<?php

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response;

class SavingErrorException extends Exception
{
    public function __construct()
    {
        parent::__construct("Saving error", Response::HTTP_NOT_FOUND);
    }
}
