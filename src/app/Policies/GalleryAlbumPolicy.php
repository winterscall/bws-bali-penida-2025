<?php

namespace App\Policies;

use App\Models\Gallery\GalleryAlbum;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class GalleryAlbumPolicy
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
    public function view(User $user, GalleryAlbum $galleryAlbum): bool
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
    public function update(User $user, GalleryAlbum $galleryAlbum): bool
    {
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, GalleryAlbum $galleryAlbum): bool
    {
        return true;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, GalleryAlbum $galleryAlbum): bool
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, GalleryAlbum $galleryAlbum): bool
    {
        return true;
    }

    public function publish(User $user, GalleryAlbum $album): bool
    {
        if($album->published_at) {
            return false;
        }

        return true;
    }

    public function unpublish(User $user, GalleryAlbum $album): bool
    {
        if($album->published_at) {
            return true;
        }

        return false;
    }
}
