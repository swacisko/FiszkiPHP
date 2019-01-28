<?php

namespace App\Http\Controllers;

use App\Memobox;
use App\Flashcard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

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
        $flipped = false;
//        dd($flashcard);
        if( isset($flashcard) ) return view('/learning/show', compact('flashcard', 'memobox', 'flipped'));
        else{

            echo("There are no flashcards in memobox --->  $memobox->description");
            return $this->index();
        }
    }

    public function correct_answer( Flashcard $flashcard )
    {

        $memobox = $flashcard->memobox;

//        dd($flashcard);
        $flashcard->moveToNextCompartment();

//        dd($flashcard);
//        $current_compartment = $flashcard->number_in_compartment;
//
//        $flashcard->number_of_compartment++;
//        $flashcard->save();
//
//
//        $comp = $memobox->get_next_compartment_to_learn_from();
//        $flashcard = $memobox->get_first_flashcard_in_compartment($comp);
//
//        $ucf = $memobox->user_current_flashcard;
//        dd($ucf);
//        $ucf->flashcard_id = $flashcard->id;
//        dd($ucf);
//        $ucf->save();

//        dd($ucf);
//        $flashcard->user_current_flashcard()->save( compact('ucf') );

//        dd($flashcard->user_current_flashcard);
//        $flashcard->user_current_flashcard()->associate( $ucf );
//        $flashcard->save();

//        dd($ucf);
//        $ucf->flashcard()->associate($flashcard);
//        $ucf->save();

//        dd('przeszlo');
        return Redirect::to( "/learning/$memobox->id" );
    }

    public function wrong_answer( Flashcard $flashcard ){
        $memobox = $flashcard->memobox;
        if($flashcard->number_of_compartment <= $memobox->number_of_compartments){
            $flashcard->revertToFirstCompartment();
        }else{
            $this->correct_answer($flashcard);
        }


        return Redirect::to( "/learning/$memobox->id" );
    }

    public function flip( Flashcard $flashcard ){
        $memobox = $flashcard->memobox;
        $flipped = true;
//        dd($flashcard);
        if( isset($flashcard) ) return view('/learning/show', compact('flashcard', 'memobox', 'flipped') );
        else{

            echo("There are no flashcards in memobox --->  $memobox->description");
            return $this->index();
        }
    }


}
