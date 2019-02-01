<?php

namespace App\Http\Controllers;

use App\UserCurrentFlashcard;
use Illuminate\Http\Request;
use App\Flashcard;
use App\Memobox;


class FlashcardController extends Controller
{
    /**
     * function returns and array of memoboxes that are represented by select element with given name
     * @param $selectName
     */
    public function getMemoboxesFromRequestSelectForm( $selectName ){
        $select = request($selectName);
//        dd($select);
        $memoboxes = array();
        foreach( $select as $description ){
            $m = Memobox::where( 'user_id', auth()->id() )->where( 'description', $description )->get();

            if( isset($m) && count($m) == 1 ) array_push($memoboxes, $m[0] );
        }

//        dd($memoboxes);
        return $memoboxes;
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
//        dd(request());
        $memoboxes = $this->getMemoboxesFromRequestSelectForm( 'select_memoboxes' );
//    dd($memoboxes);

        foreach( $memoboxes as $memobox ){
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

//            dd($memobox);
            $validated = $this->validateFlashcard();
            $validated['user_id'] = auth()->id();
            $validated['memobox_id'] = $memobox->id;
            $validated['number_of_compartment'] = 0;
            $validated['number_in_compartment'] = 0;

            $f = Flashcard::create(
               array_merge( $validated/*request([ 'category', 'side1_text', 'side2_text' ])*/ ,  ['last_edit_date' => date('Y-m-d H:i:s') ] )
            );


            if( $memobox->count_all_flashcards() > 0 ){
                $ucf = $memobox->user_current_flashcard;
                if( !isset($ucf) ){
                    UserCurrentFlashcard::create([
                       'user_id' => auth()->id(),
                       'flashcard_id' => $f->id,
                        'memobox_id' => $memobox->id
                    ]);
                }else{
                    if( $ucf->flashcard->number_of_compartment > $memobox->number_of_compartments ){
                        $ucf->update([ 'flashcard_id' => $f->id ]);
                    }
                }
            }

            $f->moveToCompartment(0);


        }

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

//        $memoboxes = $this->getMemoboxesFromRequestSelectForm( 'select_memoboxes' );


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
