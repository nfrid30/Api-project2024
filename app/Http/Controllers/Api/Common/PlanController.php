<?php

namespace App\Http\Controllers\Api\Common;

use App\Http\Controllers\Controller;
use App\Http\Resources\Plan\PlanResource;
use App\Http\Services\Api\PlanService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class PlanController extends Controller
{
    public function __construct(
        protected PlanService $service
    )
    {
    }

    public function index(): AnonymousResourceCollection
    {
        return PlanResource::collection(
            $this->service->getActive()
        );
    }
}
