<?php

namespace App\Http\Services\Api;

use App\Enums\PostStatusEnum;
use App\Exceptions\PostAlreadyActiveException;
use App\Exceptions\UserHasNotActivePlanException;
use App\Http\DTO\Post\PostData;
use App\Http\Repositories\PlanUserRepository;
use App\Http\Repositories\PostRepository;
use App\Models\PlanUser;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class PostService
{
    public function __construct(
        protected PostRepository $repository,
        protected PlanUserRepository $planUserRepository,
    )
    {
    }

    public function getAll(): Collection
    {
       return $this->repository->getAll();
    }

    public function getAllByUser(User $user): Collection
    {
        return $this->repository->getAllByUser($user);
    }



    public function create(PostData $postData): Post
    {
        return $this->repository->create($postData);
    }

    public function update(Post $post, PostData $postData): bool
    {
        return $this->repository->update($post, $postData);
    }

    public function delete(Post $post): ?bool
    {
        return $this->repository->delete($post);
    }

    /**
     * @throws PostAlreadyActiveException|UserHasNotActivePlanException
     */
    public function activate(Post $post, User $user): PlanUser
    {

        if (!PlanUserService::checkIsActive($user->activePlan()->first())) {
            throw new UserHasNotActivePlanException($post);
        }

        if ($post->status === PostStatusEnum::ACTIVE) {
            throw new PostAlreadyActiveException($post);
        }



        if($this->repository->activate($post)) {
            $planUser = $this->planUserRepository->decrementPublications($user);
        }

        return $planUser;
    }

}


