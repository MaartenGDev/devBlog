<?php

namespace App\Policies;

use App\Post;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;


    /**
     * Create a new policy instance.
     *
     * @return boolean
     */

    public function delete(User $user, Post $post){
        return $user->id === $post->user_id || $user->isAdmin();
    }

    public function update(User $user, Post $post)
    {
        return $user->id === $post->user_id || $user->isAdmin();
    }
}
