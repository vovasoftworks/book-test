<?php

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response;

class BookNotFoundException extends Exception
{
    public function __construct()
    {
        parent::__construct("No book found for given Author", Response::HTTP_NOT_FOUND);
    }
}
