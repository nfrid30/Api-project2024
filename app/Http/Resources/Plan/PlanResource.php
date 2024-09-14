<?php

namespace App\Http\Resources\Plan;

use App\Http\Resources\User\CreatedByResource;
use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;


/**
 * @mixin Plan
 */
class PlanResource extends JsonResource
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
            'name' => $this->name,
            'price' => $this->price,
            'publications' => $this->publications,
            'status' => $this->status->name(),
            'createdBy' => CreatedByResource::make($this->whenLoaded('createdBy'))



        ];
    }
}
