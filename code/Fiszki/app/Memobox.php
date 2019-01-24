<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Integer;

class Memobox extends Model
{

    protected $guarded = [];


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
     * adds to given memobox c flashcards from $flashcards, indexed beg, beg+1, ... , min( beg+c-1, count($flashcards) )
     */
    public function addFlashcardToMemobox( $flashcards, $beg, $c ){
        $currentComp = 1;
        $inInComp = 0;


    }

    public function set_user_current_flashcard(){

    }

    /*
     * @return returns flashcards that are in compartment with given numebr
     */
    public function get_flashcards_in_compartment(int $comp){
        $flashcards = Flashcard::with( 'user_id', $this->user_id )->with( 'number_of_compartment', $comp )->orderBy( 'number_in_compartment', 'ASC' )->get();
        return $flashcards;
    }

    /*
     * @return returns the first flashcard in given compartment or null if there are no flashcards in that compartment.
     * (first flashcard is the one that is there longest).
     */
    public function get_first_flashcard_in_compartment( $comp ){
        $flashcards = $this->get_flashcards_in_compartment($comp);
        if( count($flashcards) > 0 ) return $flashcards[0];
        else return null;
    }

    /*
     * @return number of flashcards in given compartment.
     */
    public function countFlashcardsInCompartment( $comp){
        $flashcards = Flashcard::where('user_id', auth()->id())->where( 'memobox_id', $this->id )->get();
//        dd($flashcards);
        return count($flashcards);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne user_current_flashcard associated with this memobox
     */
    public function user_current_flashcard(){
//        dd($this->id);

//          $ucf = UserCurrentFlashcard::where( 'memobox_id', $this->id )->first();
//          dd($ucf);
//          return $ucf;
        return $this->hasOne( UserCurrentFlashcard::class );
    }

    /**
     * @return instance of Flashcard associated as user current flashcard for this memmobox | null if there are no flashcards in this memobox
     */
    public function current_flashcard(){
//        dd($this->user_current_flashcard()->first());
        $ucf = $this->user_current_flashcard;
//        dd($ucf);
        if( isset($ucf) ) return Flashcard::where( 'id', $ucf->flashcard_id  )->first();
        else return null;
//        return $ucf->belongsTo(Flashcard::class);
    }



    public function addFlashcard( $flashcard ){
        $flashcards = [ $flashcard ];
        $this->addFlashcardToMemobox( $flashcards, 0,1 );
    }

    public function user(){
        return $this->belongsTo( User::class );
    }

    public function flashcards(){
        return $this->hasMany( Flashcard::class );
    }

}
