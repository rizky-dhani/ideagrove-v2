<?php

namespace App\Policies;

use App\Models\PostCategory;
use App\Models\User;

class PostCategoryPolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, PostCategory $category): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, PostCategory $category): bool
    {
        return true;
    }

    public function delete(User $user, PostCategory $category): bool
    {
        return true;
    }

    public function restore(User $user, PostCategory $category): bool
    {
        return true;
    }

    public function forceDelete(User $user, PostCategory $category): bool
    {
        return true;
    }
}
