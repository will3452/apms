<?php

namespace App\Policies;

use App\Models\Exam;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ExamPolicy
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
        return $user->can('view any exam');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Exam $exam)
    {
        return $user->can('view exam');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->can('create exam');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Exam $exam)
    {
        return $user->can('update exam');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Exam $exam)
    {
        return $user->can('delete exam');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Exam $exam)
    {
        return $user->can('restore exam');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Exam $exam)
    {
        return $user->can('force delete exam');
    }
}
