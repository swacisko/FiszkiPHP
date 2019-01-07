<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Integer;

class Memobox extends Model
{
    /*
     * returns size of given compartment. If $comp is the 0-th or number_of_compartments-th compartment, then INF will be returned (there may be infinitely many flashcards in those compartments.
     * otherwise size of the $comp-th compartment is returned.
     */
    public function getCompartmentSize($comp){
        if( $comp < 0 || $comp > $this->number_of_cocmpartments+1 ) return 0;
        if( $comp == 0 || $comp == $this->number_of_cocmpartments+1 ) return PHP_INT_MAX;
        else if($comp == 1) return $this->first_compartment_size;
        else return (int) ( pow( $this->first_compartment_size, $comp-1 ) );
    }

    /*
     * adds to given memobox c flashcards form $flashcards, indexed beg, beg+1, ... , min( beg+c-1, count($flashcards) )
     */
    public function addFlashcardToMemobox( $flashcards, $beg, $c ){
        $currentComp = 1;
        $inInComp = 0;


    }


    public function addFlashcard( $flashcard ){
        $flashcards = [ $flashcard ];
        $this->addFlashcardToMemobox( $flashcards, 0,1 );
    }

    public function user(){
        return $this->belongsTo( App\User::class );
    }

    public function flashcards(){
        return $this->hasMany( App\Flashcard::class );
    }

}
