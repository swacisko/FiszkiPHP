@extends('layout')



@section('content')

    <h1 class="title"> Your flashcards </h1>

    <div class=content>
        @foreach($flashcards as $f)
            <div class="ref">
                <li>
                    <a href="/flashcards/{{ $f->id  }}">
                        {{ $f->category }} {{ $f->side1_text  }}  {{ $f->side2_text  }}
                    </a>
                </li>
            </div>
        @endforeach
    </div>


@endsection