<?php

namespace App\Http\Controllers;

use App\Models\User;

abstract class Controller
{
    public function getUser(): User
    {
        /** @var User $user */
        $user = auth()->user();
        return $user;
    }



}
