<?php

namespace App\Http\Repositories;

use App\Enums\PostStatusEnum;
use App\Http\DTO\Post\PostData;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class PostRepository
{
    public function __construct(
        protected Post $model
    ) {
    }

    public function getAll(): Collection
    {
        return $this->model->query()->where('status', PostStatusEnum::ACTIVE->value)->latest()->get();
    }


    public function create(PostData $postData): Post
    {
        return $this->model->query()->create($postData->toArray())->refresh();
    }

    public function update(Post $post, PostData $postData): bool
    {
        return $post->update($postData->toArray());
    }

    public function delete(Post $post): ?bool
    {
        return $post->delete();
    }

    public function getAllByUser(User $user): Collection
    {
        return $this->model->query()->where('user_id', $user->getKey())->get();
    }

    public function activate(Post $post): bool
    {
        return $post->update(['status' => PostStatusEnum::ACTIVE->value]);
    }
}
