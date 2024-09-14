<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PostAlreadyActiveException extends Exception
{
    public function render(Request $request): Response
    {
        return response(['error' => 'This post already activated'], 422);
    }
}
