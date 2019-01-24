@extends('layouts.layout')



@section('content')

    <h1 class="title"> Your memoboxes </h1>


    <div>
        <a href="/memoboxes/create"> Create new memobox </a>
    </div>

    <div class=content>
        @foreach($memoboxes as $m)
            <div class="ref box">

                <a href="/memoboxes/{{ $m->id  }}">
                    {{$m->description}}
                </a>

            </div>
        @endforeach
    </div>



@endsection

