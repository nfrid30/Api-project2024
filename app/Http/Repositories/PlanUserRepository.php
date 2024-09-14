<?php

namespace App\Http\Repositories;

use App\Models\Plan;
use App\Models\PlanUser;
use App\Models\User;

class PlanUserRepository
{

    public function __construct(
        protected PlanUser $model
    ) {
    }

    public function create(Plan $plan, User $user): PlanUser
    {
        return $this->model
            ->query()
            ->create([
                'user_id' => $user->getKey(),
                'plan_id' => $plan->getKey(),
                'publications' => $plan->publications]);
    }

    public function decrementPublications(User $user): PlanUser
    {
        $user->activePlan()->decrement('publications');
        return $user->activePlan()->first();
    }
}
