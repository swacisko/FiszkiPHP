@extends('layouts.layout')



@section('content')

    <h1 class="title has-text-centered">Management section</h1>

    <div class="box has-text-centered">
        <legend class="label has-text-centered"> Flashcard management </legend>
        <div class="ref">
                <a href="/flashcards/create"> Create a flashcard </a>
        </div>

        <div class="ref">
            <a href="/flashcards"> Show your flashcards </a>
        </div>
    </div>


    <div class="ref box has-text-centered">
        <legend class="label has-text-centered"> Memobox management </legend>
        <a href="/memoboxes"> Manage your memoboxes </a>
    </div>





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