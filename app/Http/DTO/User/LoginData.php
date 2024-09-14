<?php

namespace App\Http\DTO\User;

use App\Http\DTO\CommonData;

readonly class LoginData extends CommonData
{
    public function __construct(
        public string $email,
        public string $password,
    ) {
    }
}
