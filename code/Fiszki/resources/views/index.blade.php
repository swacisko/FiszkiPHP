@extends('layouts.layout')



@section('content')

    <h1 class="title"> Welcome in the world of flashcards </h1>

    <ul>

        <li>
            <a href="/learning"> Learn! </a>
        </li>
        <li>
            <a href="/progress"> View progress </a>
        </li>
        <li>
            <a href="/management"> Manage your flashcards and memoboxes</a>
        </li>
        {{--<li>--}}
            {{--<a href="/initDatabase"> Init database for tests</a>--}}
        {{--</li>--}}

    </ul>

@endsection