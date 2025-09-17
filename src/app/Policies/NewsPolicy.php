<?php

namespace App\Policies;

use App\Models\News\News;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class NewsPolicy
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
    public function view(User $user, News $news): bool
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
    public function update(User $user, News $news): bool
    {
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, News $news): bool
    {
        return true;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, News $news): bool
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, News $news): bool
    {
        return true;
    }

    public function publish(User $user, News $news): bool
    {
        if($news->published_at) {
            return false;
        }

        // check if news has featured_image_path and content
        if(!$news->featured_image_path || !$news->content) {
            return false;
        }

        return true;
    }

    public function unpublish(User $user, News $news): bool
    {
        if($news->published_at) {
            return true;
        }

        return false;
    }
}
