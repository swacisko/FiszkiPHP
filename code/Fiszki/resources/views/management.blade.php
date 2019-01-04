@extends('layout')



@section('content')

    <h1 class="title">Flashcard management section</h1>

    <ul>
        <li>
            <a href="/flashcards/create"> Create a flashcard </a>
        </li>
        {{--<li>--}}
            {{--<a href="/flashcards/2/edit"> Edit flashcards </a>--}}
        {{--</li>--}}
        <li>
            <a href="/flashcards"> Show all flashcards </a>
        </li>
    </ul>

    {{--<div>--}}
        {{--@foreach($flashcards as $f)--}}
            {{--<div class="ref">--}}
                {{--<li>--}}
                    {{--<a href="/flashcards/{{ $f->id  }}/edit">--}}
                        {{--{{ $f->category }} {{ $f->side1_text  }}  {{ $f->side2_text  }}--}}
                    {{--</a>--}}
                {{--</li>--}}
            {{--</div>--}}
        {{--@endforeach--}}
    {{--</div>--}}
@endsection