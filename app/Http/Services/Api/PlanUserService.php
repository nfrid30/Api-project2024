<?php

namespace App\Http\Services\Api;

use App\Exceptions\UserHasActivePlanException;
use App\Http\Repositories\PlanUserRepository;
use App\Http\Resources\Plan\MinimalUserPlanResource;
use App\Models\Plan;
use App\Models\PlanUser;
use App\Models\User;
use Carbon\Carbon;

class PlanUserService
{

    public function __construct(
        protected PlanUserRepository $repository
    )
    {
    }

    public static function checkIsActive(PlanUser|MinimalUserPlanResource $planUser): bool
    {
        if(Carbon::create($planUser->created_at)?->gt(now()->subMonth()) && $planUser->publications > 0) {
            return true;
        }
        return false;
    }

    /**
     * @throws UserHasActivePlanException
     */
    public function create(Plan $plan, User $user): PlanUser
    {
        $userPlans = $user->plans()->get();
        foreach ($userPlans as $userPlan) {
            if(PlanService::checkIsActive($userPlan)) {
                throw new UserHasActivePlanException();
            }
        }

        return $this->repository->create($plan, $user);
    }
}
