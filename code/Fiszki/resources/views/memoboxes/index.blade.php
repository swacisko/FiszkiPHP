@extends('layout')



@section('content')

    <h1 class="title"> Your memoboxes </h1>



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

