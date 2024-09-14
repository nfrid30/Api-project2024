<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PostPolicy
{
    public function owner(User $user, Post $post): bool
    {
        return $post->user_id === $user->getKey();
    }
}
