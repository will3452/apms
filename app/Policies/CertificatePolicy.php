<?php

namespace App\Policies;

use App\Models\Certificate;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CertificatePolicy
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
        return $user->can('view any certificate');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Certificate  $certificate
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Certificate $certificate)
    {
        return $user->can('view certificate');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->can('create certificate');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Certificate  $certificate
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Certificate $certificate)
    {
        return $user->can('update certificate');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Certificate  $certificate
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Certificate $certificate)
    {
        return $user->can('delete certificate');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Certificate  $certificate
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Certificate $certificate)
    {
        return $user->can('restore certificate');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Certificate  $certificate
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Certificate $certificate)
    {
        return $user->can('force delete certificate');
    }
}
