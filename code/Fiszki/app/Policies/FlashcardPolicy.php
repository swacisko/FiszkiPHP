<?php

namespace App\Policies;

use App\User;
use App\Flashcard;
use Illuminate\Auth\Access\HandlesAuthorization;

class FlashcardPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the flashcard.
     *
     * @param  \App\User  $user
     * @param  \App\Flashcard  $flashcard
     * @return mixed
     */
    public function view(User $user, Flashcard $flashcard)
    {
        dd([$user->id, $flashcard->user_id]);
        return $user->id == $flashcard->user_id;
    }

    /**
     * Determine whether the user can create flashcards.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the flashcard.
     *
     * @param  \App\User  $user
     * @param  \App\Flashcard  $flashcard
     * @return mixed
     */
    public function update(User $user, Flashcard $flashcard)
    {
        return $user->id == $flashcard->user_id;
    }

    /**
     * Determine whether the user can delete the flashcard.
     *
     * @param  \App\User  $user
     * @param  \App\Flashcard  $flashcard
     * @return mixed
     */
    public function delete(User $user, Flashcard $flashcard)
    {
        //
    }

    /**
     * Determine whether the user can restore the flashcard.
     *
     * @param  \App\User  $user
     * @param  \App\Flashcard  $flashcard
     * @return mixed
     */
    public function restore(User $user, Flashcard $flashcard)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the flashcard.
     *
     * @param  \App\User  $user
     * @param  \App\Flashcard  $flashcard
     * @return mixed
     */
    public function forceDelete(User $user, Flashcard $flashcard)
    {
        //
    }
}
