@extends('layout')



@section('content')

    <h1 class="title"> Your flashcards </h1>

    <div class="box">
        <div class=content>
            {{ $flashcard->category  }} </b>
        </div>

        <div class=content>
            {{ $flashcard->side1_text}} </b>
        </div>

        <div class=content>
            {{ $flashcard->side2_text  }}
        </div>
    </div>
    <p>
        <a href="/flashcards/{{$flashcard->id}}/edit"> Edit </a>
    </p>

@endsection