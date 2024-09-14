<?php

namespace App\Enums;

enum PlanStatusEnum: int
{
    case INACTIVE = 1;
    case ACTIVE = 2;

    public function name(): string
    {
        return match($this) {
            self::INACTIVE => 'Inactive',
            self::ACTIVE => 'Active',
        };
    }

    public static function valueFormName($name): int
    {
        return match($name) {
            'Active' => self::ACTIVE->value,
            default => self::INACTIVE->value,
        };
    }

}
