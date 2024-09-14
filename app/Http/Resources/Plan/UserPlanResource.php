<?php

namespace App\Http\Resources\Plan;

use App\Enums\UserPlanStatusEnum;
use App\Http\Services\Api\PlanService;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserPlanResource extends PlanResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        return parent::toArray($request) +
            [
                'lastPublications' => $this->pivot->publications,
                'activatedAt' => $this->pivot->created_at,
                'userStatus' => $this->getStatus()
            ];
    }

    private function getStatus(): string
    {
        return PlanService::checkIsActive($this)
            ? UserPlanStatusEnum::ACTIVE->name()
            : UserPlanStatusEnum::INACTIVE->name();

    }
}
