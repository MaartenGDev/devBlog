<?php

namespace App\Policies;

use App\Photo;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PhotoPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index(User $user){
        return $user->isAdmin();
    }

    public function create(User $user){
        return $user->isAdmin();
    }

    public function store(User $user){
        return $user->isAdmin();
    }

    public function view(User $user, Photo $photo){
        return $user->id === $photo->user_id || $user->isAdmin();
    }

    public function edit(User $user, Photo $photo){
        return $user->id === $photo->user_id || $user->isAdmin();
    }

    public function delete(User $user, Photo $photo){
        return $user->id === $photo->user_id || $user->isAdmin();
    }

    public function update(User $user, Photo $photo)
    {
        return $user->id === $photo->user_id || $user->isAdmin();
    }
}
