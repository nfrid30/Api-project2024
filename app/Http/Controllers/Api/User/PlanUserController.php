<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\PlanUser\StorePlanUserRequest;
use App\Http\Resources\PlanUser\PlanUserResource;
use App\Http\Services\Api\PlanUserService;
use App\Models\Plan;

class PlanUserController extends Controller
{
    public function __construct(
        protected PlanUserService $service
    )
    {
    }

    public function store(StorePlanUserRequest $request, Plan $plan): PlanUserResource
    {
        return PlanUserResource::make($this->service->create($plan, $this->getUser()));
    }
}
