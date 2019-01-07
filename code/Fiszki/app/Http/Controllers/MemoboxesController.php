<?php

namespace App\Http\Controllers;

use App\Memobox;
use Illuminate\Http\Request;

class MemoboxesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $memoboxes = Memobox::all();
        return view('/memoboxes.index', compact( 'memoboxes' ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Memobox  $memobox
     * @return \Illuminate\Http\Response
     */
    public function show(Memobox $memobox)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Memobox  $memobox
     * @return \Illuminate\Http\Response
     */
    public function edit(Memobox $memobox)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Memobox  $memobox
     * @return \Illuminate\Http\Response
     */
    public function destroy(Memobox $memobox)
    {
        //
    }
}
