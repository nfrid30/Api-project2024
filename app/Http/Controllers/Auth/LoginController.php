<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\DTO\User\LoginData;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Services\Api\AuthService;
use Illuminate\Http\JsonResponse;

class LoginController extends Controller
{
    public function __construct(
        protected AuthService $service
    ) {
    }


    public function store(LoginRequest $request): JsonResponse
    {
        $loginData = new LoginData(...$request->validated());
        return $this->service->login($loginData);
    }
}
