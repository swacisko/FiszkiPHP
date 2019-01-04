<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flashcard extends Model
{
    protected $fillable = [
          'category', 'side1_text', 'side2_text', 'last_edit_date'
    ];
//    protected $guarded = []; // inverse of $fillable

    public function assignUser(){
        return $this;
//        return $this->hasOne('User');
    }

    /*
     * Moves given flashcard to the first compartment within the same memobox
     */
    public function revertToFirstCompartment(){
        $this->moveToCompartment(1);
    }

    /*
     * Moves given flashcard to next compartment within the same memobox
     */
    public function moveToNextCompartment(){
        
    }

    /*
     * Moves given flashcard to compartment with specified number in the same memobox
     */
    public function moveToCompartment( $compNum ){

    }

    /*
     * Moves given flashcard to other memobox
     */
    public function moveToMemobox( &$memobox ){

    }



}
