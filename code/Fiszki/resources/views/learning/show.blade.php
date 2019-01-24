@extends('layouts.layout')



@section('content')

    <h1 class="title"> YAY! Start learning! </h1>

        <div class="box">
            {{ $flashcard->category }}
        </div>
    <div class="columns box">
        <div class="column">
            {{ $flashcard->side1_text }}
        </div>
        <div class="column">
            {{ $flashcard->category }}
        </div>

    </div>


    <div class="field">
        <div class="control">
            <button type="submit" class="button is-link">FLIP</button>
            <a href="/learning/correct_answer"> <button type="submit" class="button" >I KNEW IT!</button> </a>
            {{--<form method="GET" action="/learning/correct_answer"> <button type="submit" class="button" >I KNEW IT!</button> </a> </form>--}}
            <button type="submit" class="button">NOT YET</button>
            <a class="button" href="#">Useless Button</a>
        </div>
    </div>



@endsection

