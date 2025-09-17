<?php

namespace App\Policies;

use App\Models\News\NewsType;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class NewsTypePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, NewsType $newsType): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, NewsType $newsType): bool
    {
        // if slug is balai or sda return false
        if (in_array($newsType->slug, ['balai', 'sda'])) {
            return false;
        }

        return true;  
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, NewsType $newsType): bool
    {
        // if slug is balai or sda return false
        if (in_array($newsType->slug, ['balai', 'sda'])) {
            return false;
        }

        return true;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, NewsType $newsType): bool
    {
        // if slug is balai or sda return false
        if (in_array($newsType->slug, ['balai', 'sda'])) {
            return false;
        }

        return true;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, NewsType $newsType): bool
    {
        // if slug is balai or sda return false
        if (in_array($newsType->slug, ['balai', 'sda'])) {
            return false;
        }

        return true;
    }
}
