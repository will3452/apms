<?php

namespace App\Policies;

use App\Models\Grade;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class GradePolicy
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
        return $user->can('view any grade');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Grade $grade)
    {
        return $user->can('view grade');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->can('create grade');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Grade $grade)
    {
        return $user->can('update grade');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Grade $grade)
    {
        return $user->can('delete grade');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Grade $grade)
    {
        return $user->can('restore grade');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Grade $grade)
    {
        return $user->can('force delete grade');
    }
}
