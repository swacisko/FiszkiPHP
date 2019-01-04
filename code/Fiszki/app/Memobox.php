<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Memobox extends Model
{
    //

    /*
     * adds to given memobox c flashcards form $flashcards, indexed beg, beg+1, ... , min( beg+c-1, count($flashcards) )
     */
    public function addToMemobox( &$flashcards, $beg, $c ){
        $currentComp = 1;
        $inInComp = 0;



    }


}
