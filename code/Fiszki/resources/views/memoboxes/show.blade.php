@extends('layouts.layout')



@section('content')


    {{--<h1 class="title"> Your flashcards </h1>--}}
    @include('memoboxes.memobox_statistics')

    {{--<div class="box">--}}
        {{--<div class=content>--}}
            {{--{{ $flashcard->category  }} </b>--}}
        {{--</div>--}}

        {{--<div class=content>--}}
            {{--Memobox description: {{ $memobox->description}} </b>--}}
        {{--</div>--}}

        {{--@for($i=1; $i<$memobox->number_of_compartments+1; $i++)--}}
            {{--<li>--}}
                {{--Size of {{$i}} compartment: {{$memobox->countFlashcardsInCompartment($i)}}--}}
            {{--</li>--}}
        {{--@endfor--}}

        {{--<div class=content>--}}
            {{--{{ $flashcard->side2_text  }}--}}
        {{--</div>--}}
    {{--</div>--}}

    @can('update', $memobox)
        <div class="content">

            <p>
                <a href="/memoboxes/{{$memobox->id}}/edit"> <button class="button is-link">Edit </button>  </a>
            </p>
        </div>
    @endcan

    @can('view', $memobox)

        <div class="box has-text-centered">
                <legend class="label"> Memobox flashcards </legend>
            <div class="columns">

                @for($i=0; $i < $memobox->number_of_compartments+2; $i++)
                    <div class="column">
                                @if($i==0) <div class="content is-large" style="color:orange"> To learn </div>
                                    @elseif($i == $memobox->number_of_compartments+1) <div class="content is-large" style="color:orange"> Learned </div>
                                    @else  <div class="content is-large" style="color:black"> Compartment {{$i}} </div>
                                @endif
                        @foreach( $memobox->get_flashcards_in_compartment($i) as $flashcard )
                            @include('flashcards.flashcard_info')

                        @endforeach
                    </div>
                @endfor


            </div>
        </div>

    @endcan


@endsection