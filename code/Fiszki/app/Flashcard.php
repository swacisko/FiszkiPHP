<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Memobox;

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
        $memobox = $this->memobox;
//        $current_compartment = $this->number_in_compartment;
//
//        $this->number_of_compartment++;
        $this->save();


        $comp = $memobox->get_next_compartment_to_learn_from();
        $flashcard = $memobox->get_first_flashcard_in_compartment($comp);

        $ucf = $memobox->user_current_flashcard;
//        dd($ucf);
        $ucf->flashcard_id = $flashcard->id;
//        dd($ucf);
        $ucf->save();

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
     * Moves given flashcard to compartment with specified number in the same memobox
     */
    public function moveToCompartment( $compNum ){

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
