@extends('layout')



@section('content')

    <h1 class="title">Management section</h1>

    <div class="box">
        <div class="ref">
                <a href="/flashcards/create"> Create a flashcard </a>
        </div>

        <div class="ref">
            <a href="/flashcards"> Manage your flashcards </a>
        </div>
    </div>


    <div class="ref box">
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