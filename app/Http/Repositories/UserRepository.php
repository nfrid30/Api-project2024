<?php

namespace App\Http\Repositories;

use App\Http\DTO\User\LoginData;
use App\Http\DTO\User\UserData;
use App\Models\User;

class UserRepository
{
    public function __construct(
        protected User $model
    ) {
    }

    public function create(UserData $userData): User
    {
        return $this->model->query()->create($userData->toArray());
    }

    public function getByLoginData(LoginData $loginData): User
    {
        return $this->getByEmail($loginData->email);
    }

    public function getByEmail(string $email): User
    {
        return $this->model->query()->where('email', $email)->firstOrFail();
    }



}
