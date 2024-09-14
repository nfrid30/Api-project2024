<?php

namespace App\Http\Services\Api;

use App\Enums\UserRoleEnum;
use App\Models\User;

class UserService
{
    public static function isAdmin(User $user): bool
    {
        return $user->role === UserRoleEnum::ADMIN;
    }

}
