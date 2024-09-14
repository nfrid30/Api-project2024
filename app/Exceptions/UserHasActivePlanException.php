<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserHasActivePlanException extends Exception
{
    public function render(Request $request): Response
    {
        return response(['error' => 'You already has an active plan.'], 422);
    }
}
