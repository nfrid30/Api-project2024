<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\DTO\User\UserData;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Services\Api\AuthService;
use Illuminate\Http\JsonResponse;

class RegisterController extends Controller
{

    public function __construct(
        protected AuthService $service
    )
    {
    }

    public function store(RegisterRequest $request): JsonResponse
    {
        $userData = new UserData(...$request->validated());
        return $this->service->register($userData);
    }
}
