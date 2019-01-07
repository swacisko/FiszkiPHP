@extends('layout')



@section('content')

    <h1 class="title"> Your flashcards </h1>

    @if( count( $flashcards ) != 0 )
        <div class=content>
            @foreach($flashcards as $f)
                <div class="ref box">
                    {{--<li>--}}
                        <a href="/flashcards/{{ $f->id  }}">
                            {{ $f->category }} </br>
                            {{ $f->side1_text  }}  </br>
                            {{ $f->side2_text  }}
                        </a>
                    {{--</li>--}}
                </div>
            @endforeach
        </div>
    @endif


@endsection