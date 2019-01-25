@extends('layouts.layout')



@section('content')

    <h1 class="title"> YAY! Start learning! </h1>

    @include('memoboxes.memobox_statistics')

    <div class="content box">
        <div class="box has-text-centered">
            <legend class="label">Category</legend>
            {{ $flashcard->category }}
        </div>

        <div class="columns box">
            <div class="column has-text-centered">
                <legend class="label">Side 1 text</legend>
                {{ $flashcard->side1_text }}
            </div>
            <div class="column has-text-centered">
                <legend class="label">Side 2 text</legend>
                {{ $flashcard->side2_text }}
            </div>

        </div>
    </div>


    <div class="field">
        <div class="control">
            <a href="/learning/flip/{{$flashcard->id}}"> <button type="submit" class="button is-link" >FLIP</button> </a>
            <a href="/learning/correct_answer/{{ $flashcard->id  }}"> <button type="submit" class="button" >I KNEW IT!</button> </a>
            {{--<form method="GET" action="/learning/correct_answer"> <button type="submit" class="button" >I KNEW IT!</button> </form>--}}
            <a href="/learning/wrong_answer/{{ $flashcard->id  }}"> <button type="submit" class="button" >NOT YET</button> </a>
            <a class="button" href="#">Useless Button</a>
        </div>
    </div>



@endsection

