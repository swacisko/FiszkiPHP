<?php

namespace App\Http\Controllers;

use App\Memobox;
use Illuminate\Http\Request;

class MemoboxesController extends Controller
{


    public function validateMemobox(){
        $validated = request()->validate([ // if fails redirects to previous page and in $errors there are errors given
            'description' => ['required','min:3'],
            'number_of_compartments' => 'required|integer',
            'first_compartment_size' => 'required|integer',
            'capacity_factor' => 'required|numeric|between:1,3',
        ]);

        return $validated;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $memoboxes = Memobox::where('user_id', auth()->id())->get();
        return view('/memoboxes.index', compact( 'memoboxes' ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/memoboxes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $this->validateMemobox();
        $validated['user_id'] = auth()->id();
        Memobox::create($validated);

        return redirect('/memoboxes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Memobox  $memobox
     * @return \Illuminate\Http\Response
     */
    public function show(Memobox $memobox)
    {
//        $this->authorize('view', $memobox);
        return view('/memoboxes/show', compact('memobox'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Memobox  $memobox
     * @return \Illuminate\Http\Response
     */
    public function edit(Memobox $memobox)
    {
//        $this->authorize('update', $memobox);
        return view('/memoboxes/edit', compact('memobox'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Memobox  $memobox
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Memobox $memobox)
    {
        $validated = $this->validateMemobox();
//        $this->authorize('update', $validated);
        $memobox->update($validated);
        return redirect('/memoboxes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Memobox  $memobox
     * @return \Illuminate\Http\Response
     */
    public function destroy(Memobox $memobox)
    {
        $memobox->delete();
        return redirect('memoboxes');
    }
}
