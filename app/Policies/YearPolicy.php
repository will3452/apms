<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Year;
use Illuminate\Auth\Access\HandlesAuthorization;

class YearPolicy
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
        return $user->can('view any year');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Year  $year
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Year $year)
    {
        return $user->can('view year');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->can('create year');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Year  $year
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Year $year)
    {
        return $user->can('update year');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Year  $year
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Year $year)
    {
        return $user->can('delete year');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Year  $year
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Year $year)
    {
        return $user->can('restore year');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Year  $year
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Year $year)
    {
        return $user->can('force delete year');
    }
}
