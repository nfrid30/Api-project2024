<?php

namespace App\Enums;

enum UserPlanStatusEnum:int
{
    case INACTIVE = 1;
    case ACTIVE = 2;

    public function name()
    {
        return match($this) {
            self::INACTIVE => 'Inactive',
            self::ACTIVE => 'Active',
        };
    }
}
