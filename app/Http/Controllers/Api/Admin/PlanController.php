<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\DTO\Plan\PlanData;
use App\Http\Requests\Api\Plan\StorePlanRequest;
use App\Http\Requests\Api\Plan\UpdatePlanRequest;
use App\Http\Resources\Plan\PlanResource;
use App\Http\Services\Api\PlanService;
use App\Models\Plan;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class PlanController extends Controller
{

    public function __construct(
        protected PlanService $service
    ) {
    }

    public function index(): AnonymousResourceCollection
    {
        return PlanResource::collection($this->service->getAll());
    }

    public function store(StorePlanRequest $request): PlanResource
    {
        $planData = new PlanData(...$request->validated());
        return PlanResource::make($this->service->create($planData));
    }

    /**
     * Display the specified resource.
     */
    public function show(Plan $plan): PlanResource
    {
        return PlanResource::make($this->service->show($plan));
    }

    public function update(UpdatePlanRequest $request, Plan $plan): PlanResource
    {
        $planData = new PlanData(...$request->validated());
        $this->service->update($plan, $planData);
        return PlanResource::make($plan);
    }

    public function destroy(Plan $plan): PlanResource
    {
        $this->service->delete($plan);
        return PlanResource::make($plan);
    }
}

//test fort git
