<?php

namespace App\Policies;

use App\Models\Recognition;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RecognitionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return $user->can('view any recognition');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Recognition  $recognition
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Recognition $recognition)
    {
        return $user->can('view recognition');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->can('create recognition');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Recognition  $recognition
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Recognition $recognition)
    {
        return $user->can('update recognition');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Recognition  $recognition
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Recognition $recognition)
    {
        return $user->can('delete recognition');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Recognition  $recognition
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Recognition $recognition)
    {
        return $user->can('restore recognition');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Recognition  $recognition
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Recognition $recognition)
    {
        return $user->can('force delete recognition');
    }
}
