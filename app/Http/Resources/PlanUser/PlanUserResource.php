<?php

namespace App\Http\Resources\PlanUser;

use App\Models\PlanUser;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 *
 * @mixin PlanUser
 */

class PlanUserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->getKey(),
            'plan_id' => $this->plan_id,
            'user_id' => $this->user_id,
            'publications' => $this->publications,
        ];
    }
}
