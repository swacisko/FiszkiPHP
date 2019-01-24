@extends('layouts.layout')



@section('content')

    {{--<h1 class="title"> Your flashcards </h1>--}}

    <div class="box">
        {{--<div class=content>--}}
            {{--{{ $flashcard->category  }} </b>--}}
        {{--</div>--}}

        <div class=content>
            Memobox description: {{ $memobox->description}} </b>
        </div>

        @for($i=1; $i<$memobox->number_of_compartments+1; $i++)
            <li>
                Size of {{$i}} compartment: {{$memobox->countFlashcardsInCompartment($i)}}
            </li>
        @endfor

        {{--<div class=content>--}}
            {{--{{ $flashcard->side2_text  }}--}}
        {{--</div>--}}
    </div>

    @can('update', $memobox)
        <p>
            <a href="/memoboxes/{{$memobox->id}}/edit"> Edit </a>
        </p>
    @endcan

@endsection