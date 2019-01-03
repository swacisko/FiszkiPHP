@extends('layout')



@section('content')

    <h1>Flashcard management section</h1>

    <ul>
        <li>
            <a href="/flashcards/create"> Create a flashcard </a>
        </li>
        <li>
            <a href="/flashcards/1/edit"> Edit flashcards </a>
        </li>
    </ul>

    <ul>
        @foreach($flashcards as $f)
            {{--<div>--}}
                <li>
                {{ $f->category }} {{ $f->side1_text  }}  {{ $f->side2_text  }}
                </li>
            {{--</div>--}}

        @endforeach
    </ul>
@endsection