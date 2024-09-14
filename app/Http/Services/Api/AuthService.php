<?php

namespace App\Http\Services\Api;

use App\Http\DTO\User\LoginData;
use App\Http\DTO\User\UserData;
use App\Http\Repositories\UserRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class AuthService
{

    public function __construct(
        protected UserRepository $userRepository
    ) {
    }

    public function register(UserData $userData): JsonResponse
    {
        $user = $this->userRepository->create($userData);
        $token = $user->createToken('register token');

        return response()->json(['token' => $token->plainTextToken]);
    }

    public function login(LoginData $loginData): JsonResponse
    {
        if(Auth::attempt($loginData->toArray())) {
            $user = $this->userRepository->getByLoginData($loginData);
            $token = $user->createToken('login token');

            return response()->json(['token' => $token->plainTextToken]);
        };

        return response()->json(['status' => 'Unauthorized'], 401);
    }
}
