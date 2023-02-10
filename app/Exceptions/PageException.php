<?php

namespace App\Exceptions;

use Exception;

class PageException extends Exception
{
    public function render($request)
    {
        return response()->view('pages.errors.error404');
    }
}
