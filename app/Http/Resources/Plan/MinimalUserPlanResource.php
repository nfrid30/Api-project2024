<?php

namespace App\Http\Resources\Plan;

use App\Enums\UserPlanStatusEnum;
use App\Http\Services\Api\PlanService;
use App\Http\Services\Api\PlanUserService;
use App\Models\PlanUser;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;


/**
 * @mixin PlanUser
 */
class MinimalUserPlanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        return
            [
                'id' => $this->getKey(),
                'lastPublications' => $this->publications,
                'activatedAt' => $this->created_at,
                'status' => $this->getStatus()
            ];
    }

    private function getStatus(): string
    {
        return PlanUserService::checkIsActive($this)
            ? UserPlanStatusEnum::ACTIVE->name()
            : UserPlanStatusEnum::INACTIVE->name();

    }
}
