<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Flashcard;

class FlashcardController extends Controller
{
    /**
     * function returns and array of memoboxes that are represented by select element with given name
     * @param $selectName
     */
    public function getMemoboxesFromRequestSelectForm( $selectName ){

    }

    public function index(){
//        dd(config( 'flashcards.memobox.capacity_factor' ));
        $flashcards = Flashcard::where('user_id', auth()->id())->get();
        return view( '/flashcards.index', compact('flashcards') );
    }


    //
    public function create(){

        return view('/flashcards.create');
    }

    public function validateFlashcard(){
        $validated = request()->validate([ // if fails redirects to previous page and in $errors there are errors given
            'category' => ['required','min:3'],
            'side1_text' => 'required|min:5',
            'side2_text' => 'required|min:5'
        ]);

        return $validated;
    }

    public function store(){

//        $f = new Flashcard();
//        $f->user_id = 1;
//        $f->category = request( 'category' );
//        $f->side1_text = request('side1_text');
//        $f->side2_text = request("side2_text");
//        $f->last_edit_date = date('Y-m-d H:i:s');
//        $f->save();


//        Flashcard::create([
//            'category' => request('category'),
//            'side1_text' => request('side1_text'),
//            'side2_text' => request('side2_text'),
//            'last_edit_date' => date('Y-m-d H:i:s')
//        ]);

//        $validated = request()->validate([ // if fails redirects to previous page and in $errors there are errors given
//           'category' => ['required','min:3'],
//            'side1_text' => 'required|min:5',
//            'side2_text' => 'required|min:5'
//        ]);

        $validated = $this->validateFlashcard();
        $validated['user_id'] = auth()->id();

        Flashcard::create(
           array_merge( $validated/*request([ 'category', 'side1_text', 'side2_text' ])*/ ,  ['last_edit_date' => date('Y-m-d H:i:s') ] )
        );

        return redirect( '/management' );
    }

    public function edit(Flashcard $flashcard){

        $this->authorize('update', $flashcard);
        return view('/flashcards.edit', compact('flashcard'));
//        return back();
    }

    public function show(Flashcard $flashcard){
//        $flashcard = Flashcard::findOrFail($id);
//        dd( $flashcard );
//        abort_if( $flashcard->user->id !== auth()->id(), 403 );
//        abort_unless( $flashcard->user->id == auth()->id(), 403 )''
//        abort_if( \Gate::denies('update', $flashcard), 403 );
//        abort_unless( \Gate::allows('update', $flashcard), 403 );

//        $this->authorize('update', $flashcard);
        return view('/flashcards/show', compact('flashcard'));
    }

    public function update( Flashcard $flashcard ){
//        dd(request()->all());

        $validated = $this->validateFlashcard();

//        $flashcard = Flashcard::findOrFail($id);
        $flashcard->update( $validated );
//        $flashcard->category = request('category');
//        $flashcard->side1_text = request('side1_text');
//        $flashcard->side2_text = request('side2_text');
//        $flashcard->save();

        return redirect( '/flashcards' );
//        return back();
    }

    public function destroy( Flashcard $flashcard ){

//        Flashcard::findOrFail($id)->delete();
        $flashcard->delete();

//        dd('destroy');
        return redirect('flashcards');
    }



}
