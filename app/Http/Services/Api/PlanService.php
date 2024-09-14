<?php

namespace App\Http\Services\Api;

use App\Http\DTO\Plan\PlanData;
use App\Http\Repositories\PlanRepository;
use App\Http\Resources\Plan\UserPlanResource;
use App\Models\Plan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

class PlanService
{

    public function __construct(
        protected PlanRepository $repository
    )
    {
    }

    public function getAll(): Collection
    {
        return $this->repository->getAll();
    }

    public function create(PlanData $planData): Plan
    {
        return $this->repository->create($planData);
    }

    public function show(Plan $plan): Plan
    {
        return $this->repository->show($plan);
    }

    public function update(Plan $plan, PlanData $planData): bool
    {
        return $this->repository->update($plan, $planData);
    }

    public function delete(Plan $plan): ?bool
    {
        return $this->repository->delete($plan);
    }

    public function getActive(): Collection
    {
        return $this->repository->getActive();
    }

    public function getAllByUser(User $user): Collection
    {
        return $this->repository->getAllByUser($user);
    }

    public static function checkIsActive(Plan|UserPlanResource $plan): bool
    {
        if(Carbon::create($plan->pivot->created_at)?->gt(now()->subMonth()) && $plan->pivot->publications > 0) {
            return true;
        }
        return false;

    }


}
