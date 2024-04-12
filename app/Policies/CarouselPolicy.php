<?php

namespace App\Policies;

use App\Models\CarouselSlide;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CarouselPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
        return $user->type === 'admin';
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, CarouselSlide $carouselSlide): bool
    {
        //
        return $user->type === 'admin';
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
        return $user->type === 'admin';
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, CarouselSlide $carouselSlide): bool
    {
        //
        return $user->type === 'admin';
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, CarouselSlide $carouselSlide): bool
    {
        //
        return $user->type === 'admin';
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, CarouselSlide $carouselSlide): bool
    {
        //
        return $user->type === 'admin';
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, CarouselSlide $carouselSlide): bool
    {
        //
        return $user->type === 'admin';
    }
}
