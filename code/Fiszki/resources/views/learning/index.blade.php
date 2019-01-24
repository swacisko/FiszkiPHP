@extends('layouts.layout')



@section('content')

    <h1 class="title"> Choose memobox from which you would like to learn </h1>


    <div class=content>
        @foreach($memoboxes as $m)
            <div class="ref box">

                <a href="/learning/{{ $m->id  }}">
                    {{$m->description}}
                </a>

            </div>
        @endforeach
    </div>



@endsection

