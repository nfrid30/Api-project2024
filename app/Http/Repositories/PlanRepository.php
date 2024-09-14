<?php

namespace App\Http\Repositories;

use App\Enums\PlanStatusEnum;
use App\Http\DTO\Plan\PlanData;
use App\Models\Plan;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class PlanRepository
{

    public function __construct(
        protected Plan $model
    ) {
    }

    public function getAll(): Collection
    {
        return $this->model->all();
    }


    public function create(PlanData $planData): Plan
    {
        return $this->model->query()->create($planData->toArray())->refresh();
    }

    public function show(Plan $plan): Plan
    {
        $plan->load('createdBy');
        return $plan;
    }

    public function update(Plan $plan, PlanData $planData): bool
    {
        return $plan->update($planData->toArray());
    }

    public function delete(Plan $plan): ?bool
    {
        return $plan->delete();
    }

    public function getActive(): Collection
    {
        return $this->model->query()->where('status', PlanStatusEnum::ACTIVE->value)->get();
    }

    public function getAllByUser(User $user): Collection
    {

        return $user->plans()->get();
    }
}
