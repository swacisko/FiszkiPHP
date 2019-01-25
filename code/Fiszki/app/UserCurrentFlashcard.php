<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserCurrentFlashcard extends Model
{
//    protected $primaryKey = 'memobox_id';
//    public $incrementing = false;

    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo relationhsip which 'returns' flashcard with id = flashcard_id
     */
    public function flashcard(){
        return $this->belongsTo(Flashcard::class);
    }

    /**
     * @return number of current compartment (since current flashcard is always the first one in a compartment, i could store current compartment instead of current flashcard).
     */
    public function current_compartment(){
        return $this->flashcard->number_of_compartment;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo relationship returning a User that owns this current flashcard
     */
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function memobox(){
        return $this->belongsTo(Memobox::class);
    }
}
