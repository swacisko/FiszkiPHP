@extends('layouts.layout')



@section('content')

    {{--<h1 class="title"> Your memoboxes </h1>--}}


    {{--<div>--}}
        {{--<a href="/memoboxes/create"> Create new memobox </a>--}}
    {{--</div>--}}

    <div class="field">
        <div class="control">
            <a href="/memoboxes/create"> <button type="submit" class="button is-link" >Create new memobox</button> </a>
        </div>
    </div>

    <div class="content box has-text-centered">
        <legend class="label has-text-centered is-large"> Your memoboxes </legend>
        @foreach($memoboxes as $m)
            <div class="ref box">

                <a href="/memoboxes/{{ $m->id  }}">
                    {{$m->description}}
                </a>

            </div>
        @endforeach
    </div>



@endsection

