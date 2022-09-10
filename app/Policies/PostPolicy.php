<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class PostPolicy
{
    use HandlesAuthorization;

    public function author(User $user, Post $post)
    {
        if ($user->id === $post->user_id) {
            return true;
        }
        if ($post->public == 0) {
            return Response::denyAsNotFound();
        }
        if ($user->id != $post->user_id) {
            return Response::deny();
        }
        return true;
    }
}
