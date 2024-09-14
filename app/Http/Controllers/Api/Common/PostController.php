<?php

namespace App\Http\Controllers\Api\Common;

use App\Http\Controllers\Controller;
use App\Http\Resources\Post\PostResource;
use App\Http\Services\Api\PostService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class PostController extends Controller
{
    public function __construct(
        protected PostService $service
    ) {
    }


    public function index(): AnonymousResourceCollection
    {
        return PostResource::collection($this->service->getAll());
    }
}
