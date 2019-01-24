<?php

namespace App\Policies;

use App\User;
use App\Memobox;
use Illuminate\Auth\Access\HandlesAuthorization;

class MemoboxPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the memobox.
     *
     * @param  \App\User  $user
     * @param  \App\Memobox  $memobox
     * @return mixed
     */
    public function view(?User $user, Memobox $memobox)
    {
        return $user->id == $memobox->user_id;
    }

    /**
     * Determine whether the user can create memoboxes.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the memobox.
     *
     * @param  \App\User  $user
     * @param  \App\Memobox  $memobox
     * @return mixed
     */
    public function update(User $user, Memobox $memobox)
    {
        return $user->id == $memobox->user_id;
    }

    /**
     * Determine whether the user can delete the memobox.
     *
     * @param  \App\User  $user
     * @param  \App\Memobox  $memobox
     * @return mixed
     */
    public function delete(User $user, Memobox $memobox)
    {
        //
    }

    /**
     * Determine whether the user can restore the memobox.
     *
     * @param  \App\User  $user
     * @param  \App\Memobox  $memobox
     * @return mixed
     */
    public function restore(User $user, Memobox $memobox)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the memobox.
     *
     * @param  \App\User  $user
     * @param  \App\Memobox  $memobox
     * @return mixed
     */
    public function forceDelete(User $user, Memobox $memobox)
    {
        //
    }
}
