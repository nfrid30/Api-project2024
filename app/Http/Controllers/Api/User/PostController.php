<?php

namespace App\Http\Controllers\Api\User;

use App\Exceptions\PostAlreadyActiveException;
use App\Exceptions\UserHasNotActivePlanException;
use App\Http\Controllers\Controller;
use App\Http\DTO\Post\PostData;
use App\Http\Requests\Api\Post\StorePostRequest;
use App\Http\Requests\Api\Post\UpdatePostRequest;
use App\Http\Resources\Plan\MinimalUserPlanResource;
use App\Http\Resources\Post\PostResource;
use App\Http\Services\Api\PostService;
use App\Models\Post;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    public function __construct(
        protected PostService $service
    )
    {
    }

    public function index(): AnonymousResourceCollection
    {
        return PostResource::collection($this->service->getAllByUser($this->getUser()));
    }

    public function store(StorePostRequest $request): PostResource
    {
        $postData = new PostData(...$request->validated());
        return PostResource::make($this->service->create($postData));
    }

    public function show(Post $post): PostResource
    {
        Gate::authorize('owner', $post);

        return PostResource::make($post);
    }

    public function update(UpdatePostRequest $request, Post $post): PostResource
    {
        Gate::authorize('owner', $post);
        $postData = new PostData(...$request->validated());
        $this->service->update($post, $postData);
        return PostResource::make($post);
    }

    public function destroy(Post $post): PostResource
    {
        Gate::authorize('owner', $post);
        $this->service->delete($post);
        return PostResource::make($post);
    }

    /**
     * @throws PostAlreadyActiveException
     * @throws UserHasNotActivePlanException
     */
    public function activate(Post $post): MinimalUserPlanResource
    {
        Gate::authorize('owner', $post);

        $planUser = $this->service->activate($post, $this->getUser());

        return MinimalUserPlanResource::make($planUser);
    }
}
