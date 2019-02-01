@extends('layouts.layout')



@section('content')

    <h1 class="title has-text-centered"> Choose memobox from which you would like to learn </h1>


    <div class="content has-text-centered">
        @foreach($memoboxes as $m)
            <div class="ref box">

                <a href="/learning/{{ $m->id  }}">
                    {{$m->description}}
                </a>

            </div>
        @endforeach
    </div>



@endsection

