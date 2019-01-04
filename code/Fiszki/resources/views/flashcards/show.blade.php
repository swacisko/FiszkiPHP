@extends('layout')



@section('content')

    <h1 class="title"> Your flashcards </h1>

    <div class=content>
        {{ $flashcard->category  }} </b>
        {{ $flashcard->side1_text}} </b>
        {{ $flashcard->side2_text  }}
    </div>

    <p>
        <a href="/flashcards/{{$flashcard->id}}/edit"> Edit </a>
    </p>

@endsection