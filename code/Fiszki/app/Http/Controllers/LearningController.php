<?php

namespace App\Http\Controllers;

use App\Memobox;
use Illuminate\Http\Request;

class LearningController extends Controller
{
    public function index(){
        $memoboxes = Memobox::where( 'user_id', auth()->id() )->get();
//        dd($memoboxes);
        return view('/learning.index', compact('memoboxes'));
    }


    public function show(Memobox $memobox){
//        $memobox = Memobox::where('id',$memobox)->first();
//        dd($memobox);
        $flashcard = $memobox->current_flashcard();
//        dd($flashcard);
        if( isset($flashcard) ) return view('/learning/show', compact('flashcard'));
        else{

            echo("There are no flashcards in memobox --->  $memobox->description");
            return $this->index();
        }
    }

    public function correct_answer( Flashcard $flashcard )
    {
        dd('siemka');
        $memobox = $flashcard->memobox;
        $current_compartment = $flashcard->number_in_compartment;

        $flashcard->number_in_compartment++;
        $flashcard->save();

        $flashcard = $memobox->get_first_flasshcard_in_compartment;
        $ucf = $memobox->user_current_flashcard();
        $ucf->flashcard()->associate($flashcard);
        $ucf->save();

        dd('siemka');
//        return redirect( '/learning/{ $memobox->id }' );
    }

    public function wrong_answer( Flashcard $flashcard ){

    }
}
