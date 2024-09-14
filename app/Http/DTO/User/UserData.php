<?php

namespace App\Http\DTO\User;

use App\Http\DTO\CommonData;

readonly class UserData extends CommonData
{
    public function __construct(
        public string $name,
        public string $email,
        public string $password,
    ) {
    }
}
