<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserHasNotActivePlanException extends Exception
{
    public function render(Request $request): Response
    {
        return response(['error' => 'You dont have an active plan.'], 422);
    }
}
