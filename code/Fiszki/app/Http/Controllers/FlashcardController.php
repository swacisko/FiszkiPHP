<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Flashcard;

class FlashcardController extends Controller
{
    public function index(){
        dd('index');
    }
    //
    public function create(){

        return view('/flashcards.create');
    }

    public function store(){

        $f = new Flashcard();
        $f->user_id = 1;
        $f->category = request( 'category' );
        $f->side1_text = request('side1_text');
        $f->side2_text = request("side2_text");
        $f->last_edit_date = date('Y-m-d H:i:s');

        $f->save();

        return redirect( '/management' );
    }

    public function edit($id){

        $flashcard = Flashcard::findOrFail($id);
//        return $flashcard;

        return view('/flashcards.edit', compact('flashcard'));
    }

    public function show(){

    }

    public function update( $id ){
//        dd(request()->all());

        $flashcard = Flashcard::findOrFail($id);
        $flashcard->category = request('category');
        $flashcard->side1_text = request('side1_text');
        $flashcard->side2_text = request('side2_text');

        $flashcard->save();

        return redirect( '/management' );
    }

    public function destroy( $id ){

        Flashcard::findOrFail($id)->delete();

//        dd('destroy');
        return redirect('management');
    }



}
