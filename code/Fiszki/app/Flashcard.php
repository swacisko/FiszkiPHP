<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Flashcard extends Model
{
    protected $fillable = [
          'category', 'side1_text', 'side2_text', 'last_edit_date', 'user_id'
    ];
//    protected $guarded = []; // inverse of $fillable

//    public function update( $f ){
//        foreach( $f as $key => $value ){
//            $this->$key = $value;
//        }
//    }

    /**
     * Function creates a copy of $this flashcard and places it into learning compartment of given memobox
     * @param Memobox $memobox
     *
     */
    public function copyToMemobox( Memobox $memobox ){
        $flashcard = new Flashcard( $this );

        dd($flashcard);


    }

    /**
     * Function copies this flashcard and moves it to all memoboxes that are set
     * @param $memoboxes
     */
    public function insertToMemoboxes( array $memoboxes ){
        foreach( $memoboxes as $memobox ){
            $this->copyToMemobox($memobox);
        }
    }

    /*
     * Moves given flashcard to the first compartment within the same memobox
     */
    public function revertToFirstCompartment(){
        $this->moveToCompartment(1);
    }

    /**
     * Moves given flashcard to next compartment within the same memobox
     */
    public function moveToNextCompartment(){
        $this->moveToCompartment( $this->number_of_compartment == 0 ? 2 : $this->number_of_compartment+1 );
    }

    /*
     * Moves given flashcard to compartment with specified number in the same memobox
     */
    public function moveToCompartment( $compNum ){
        $memobox = $this->memobox;
//        $currentComp= $this->number_in_compartment;
        $oldComp = $this->number_of_compartment;
        if( $this->number_of_compartment <= $memobox->number_of_compartments ){
//            $this->number_of_compartment++;
            $this->number_of_compartment = $compNum;
            $this->number_in_compartment = $memobox->get_max_number_in_compartment($compNum)+1;
            $this->save();
        }

//
        $comp = $memobox->get_next_compartment_to_learn_from( $oldComp );
//        dd($comp);
//        if( $comp != $this->number_in_compartment-1 ){
//            $memobox->beginCompSize = $memobox->count_flashcards_in_compartment($comp);
//            $memobox->save();
//        }
        if( $comp > $memobox->number_of_compartments ) dd($comp);

        $flashcard = $memobox->get_first_flashcard_in_compartment($comp);
//        dd($flashcard);

        if( isset($flashcard) ){
            $ucf = $memobox->user_current_flashcard;
            //        dd($ucf);
            $ucf->flashcard_id = $flashcard->id;
            //        dd($ucf);
            $ucf->save();
            return $this;
        }else return null;

//        dd($ucf);
//        $flashcard->user_current_flashcard()->save( compact('ucf') );

//        dd($flashcard->user_current_flashcard);
//        $flashcard->user_current_flashcard()->associate( $ucf );
//        $flashcard->save();

//        dd($ucf);
//        $ucf->flashcard()->associate($flashcard);
//        $ucf->save();

//        dd('przeszlo');
    }

    /*
     * Moves given flashcard to other memobox
     */
    public function moveToMemobox( $memobox ){

    }


    public function user(){
//        dd('hello in users');
        return $this->belongsTo( User::class, 'user_id' );
    }

    public function memobox(){
        return $this->belongsTo( Memobox::class );
    }

    public function user_current_flashcard(){
//        dd('here');
        return $this->hasOne( UserCurrentFlashcard::class );
    }
}
