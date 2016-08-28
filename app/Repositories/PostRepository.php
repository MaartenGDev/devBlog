<?php

namespace App\Repositories;

use App\Post;
use App\User;

class PostRepository
{
    public function forUser(User $user)
    {
        return $user->posts()
            ->orderBy('created_at', 'asc')
            ->get();
    }
}