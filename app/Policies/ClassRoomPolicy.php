<?php

namespace App\Policies;

use App\Models\ClassRoom;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ClassRoomPolicy
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
        return $user->can('view any class room');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ClassRoom  $classRoom
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, ClassRoom $classRoom)
    {
        return $user->can('view class room');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->can('create class room');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ClassRoom  $classRoom
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, ClassRoom $classRoom)
    {
        return $user->can('update class room');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ClassRoom  $classRoom
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, ClassRoom $classRoom)
    {
        return $user->can('delete class room');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ClassRoom  $classRoom
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, ClassRoom $classRoom)
    {
        return $user->can('restore class room');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ClassRoom  $classRoom
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, ClassRoom $classRoom)
    {
        return $user->can('force delete class room');
    }
}
