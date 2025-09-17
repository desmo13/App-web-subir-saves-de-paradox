<?php

namespace App\Policies;

use App\Models\Game;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class GamePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        // return $user->isClient() || $user->isSuperAdmin();
        return  true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Game $game): bool
    {
        if($user->isClient() && $game->user_id === $user->id){
            return true;
        }
        if($user->isSuperAdmin()){
            return true;
        }
        if($user->isClient() && $game->isPublic()){
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {

        if($user->isSuperAdmin() || $user->isClient()){
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Game $game): bool
    {
        if($user->isSuperAdmin() ){
            return true;
        }
        if($user->isClient() && $game->user_id === $user->id){
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Game $game): bool
    {
        if($user->isSuperAdmin()){
            return true;
        }
        if($user->isClient() && $game->user_id === $user->id){
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Game $game): bool
    {
        if($user->isSuperAdmin()){
            return true;
        }
        if($user->isClient() && $game->user_id === $user->id){
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Game $game): bool
    {
        if($user->isSuperAdmin()){
            return true;
        }
        return false;
    }
}
