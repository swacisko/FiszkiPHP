@extends('layout')



@section('content')

    <h1> Create your own flashcards! </h1>


    <form method="POST" action="/flashcards">
        {{ csrf_field()  }}

        <div>
            <input type="text" name = "category" placeholder="category">
        </div>

        <div>
            <textarea name="side1_text" placeholder="side1_text"></textarea>
        </div>

        <div>
            <textarea name="side2_text" placeholder="side2_text"></textarea>
        </div>

        <div>
            <button type="submit"> Create flashcard </button>
        </div>
    </form>



@endsection