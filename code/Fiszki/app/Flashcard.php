<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Memobox;

class Flashcard extends Model
{
    protected $fillable = [
          'category', 'side1_text', 'side2_text', 'last_edit_date'
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
        return $this->belongsTo( User::class );
    }

    public function memobox(){
        return $this->belongsTo( Memobox::class );
    }

}
