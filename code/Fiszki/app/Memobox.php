<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Integer;

class Memobox extends Model
{

    protected $guarded = [];


    /**
     * @returns array containing string representing all categories among flashcards that are in this memobox
     */
    public function getAllCategoriesInMemobox(){
        $categories = Flashcard::select('category')->where('user_id', auth()->id())->where('memobox_id', $this->id)->get( /*['category']*/ )->toArray();
//        dd($categories);
        $res = [];
        foreach( $categories as $key => $c ) array_push( $res, $c['category'] );
//        dd($res);
        return $res;
    }

    /*
     * returns size of given compartment. If $comp is the 0-th or number_of_compartments-th compartment, then INF will be returned (there may be infinitely many flashcards in those compartments.
     * otherwise size of the $comp-th compartment is returned.
     */
    public function getCompartmentSize($comp){
//        echo("$comp"."</b>");
        if( $comp < 0 || $comp > $this->number_of_compartments+1 ) return 0;
        if( $comp == 0 || $comp == $this->number_of_compartments+1 ) return PHP_INT_MAX;
        else if($comp == 1){
//            dd($comp);
            return $this->first_compartment_size;
        }
        else{
//            dd($comp);
            $val = (int) ( $this->first_compartment_size * pow( $this->capacity_factor, $comp-1 ) );
//            dd($val);
            return $val;
        }
    }

    /*
     * adds to given memobox c flashcards from $flashcards, indexed beg, beg+1, ... , min( beg+c-1, count($flashcards) )
     */
    public function addFlashcardToMemobox( array $flashcards, $beg, $c ){
        $currentComp = 1;
        $inInComp = 0;

        for($i = $beg; $i < min( count($flashcards)-1,$beg + $c-1 ); $i++){
            $f = $flashcards[$i];

            $f->memobox_id = $this->id;
            $f->moveToCompartment(0);
        }


    }

    public function set_user_current_flashcard(){

    }

    /**
     * @param int $comp
     * @returns maximal number_in_compartment value of a flashcard in given by parameter compartment number
     */
    public function get_max_number_in_compartment(int $comp){
        return Flashcard::where( 'user_id', $this->user_id )->where( 'number_of_compartment', $comp )->max('number_in_compartment');
    }

    /**
     * @return returns flashcards that are in compartment with given numebr
     */
    public function get_flashcards_in_compartment(int $comp){
//        dd($comp);
        $flashcards = Flashcard::where( 'user_id', auth()->id() )->where( 'memobox_id', $this->id )->where( 'number_of_compartment', $comp )->orderBy( 'number_in_compartment', 'ASC' )->get();
//        dd($flashcards);
        return $flashcards;
    }

    /**
     * @param int $comp
     * @return int number of flashcards in given comperment
     */
    public function count_flashcards_in_compartment( int $comp ){
        return count( $this->get_flashcards_in_compartment($comp) );
    }


    /**
     * @return int all flashcards that are in given memobox
     */
    public function count_all_flashcards(){
        $sum = 0;
        for( $i=0; $i < $this->number_of_compartments+2; $i++ ){
            $sum += $this->count_flashcards_in_compartment($i);
        }
        return $sum;
    }

    /**
     * @return int all flashcards that are in proper compartments of given memobox.
     */
    public function count_flashcards_in_compartments(){
        $sum = 0;
        for( $i=1; $i <= $this->number_of_compartments; $i++ ){
            $sum += $this->count_flashcards_in_compartment($i);
        }
        return $sum;
    }

    /**
     * @return returns the first flashcard in given compartment or null if there are no flashcards in that compartment.
     * (first flashcard is the one that is there longest).
     */
    public function get_first_flashcard_in_compartment( $comp ){
        $flashcards = $this->get_flashcards_in_compartment($comp);

//            dd($comp);

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
        else{
//            dd('returns null in Memobox.current_flashcard()');
            return null;
        }
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


    public function get_next_compartment_to_learn_from( int $currentComp ){
//        $currentComp = $this->current_flashcard()->number_of_compartment;

        if( $this->count_flashcards_in_compartment($currentComp)
            > max($this->getCompartmentSize($currentComp) / 2, $this->getCompartmentSize($currentComp) /*$this->beginCompSize*/ - 10 ) ){
            return $currentComp;
        }

//        {{ echo("$currentComp"); }}

        $i = $this->number_of_compartments;
        $m = $i;
        $M = 0;
        $c = 0;
        for( ; $i >= 0; $i-- ){
            $c = $this->count_flashcards_in_compartment($i);
            if( $c >= $this->getCompartmentSize($i) ) return $i;

            $compSize = $this->getCompartmentSize($i);
            $ratio = $c / $compSize;

            if( $ratio > $M ){
                $M = $ratio;
                $m = $i;
            }
        }

        if( $this->count_flashcards_in_compartment(0) > 0 ) return 0; // If there are flashcards to learn, i add them to memobox. Otherwise I learn from the compartment with
        // the largest ratio     flashcards / capacity
        else return $m;
    }

}
