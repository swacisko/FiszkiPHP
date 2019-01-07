<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Flashcard;

class PagesController extends Controller
{
    public function index(){
        return view( 'index' );
    }

    public function learning(){
        return view( 'learning' );
    }

    public function progress(){
        return view( 'progress' );
    }

    public function management(){

//        $flashcards = Flashcard::all();

        return view( 'management'/*, compact('flashcards')*/ );
    }

//    public function initDatabase(){
//        return view('initDatabase');
//    }

}
