<?php

namespace App\Policies;

use App\Models\PostTag;
use App\Models\User;

class PostTagPolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, PostTag $tag): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, PostTag $tag): bool
    {
        return true;
    }

    public function delete(User $user, PostTag $tag): bool
    {
        return true;
    }

    public function restore(User $user, PostTag $tag): bool
    {
        return true;
    }

    public function forceDelete(User $user, PostTag $tag): bool
    {
        return true;
    }
}
