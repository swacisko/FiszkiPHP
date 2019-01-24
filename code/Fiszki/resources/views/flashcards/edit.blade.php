@extends('layouts.layout')




@section('content')


    <h1 class="title"> Edit section </h1>


    <form method="POST" action="/flashcards/{{ $flashcard->id  }}">
        @csrf
        @method('PATCH')
{{--        {{ method_field('PATCH')  }}--}}

            <div class="field" >
                <label class="label" for="Category">Category</label>
                <div class="control" >
                    <input type="text" class="input" name="category" placeholder="Category" value="{{ $flashcard->category  }}" required>
                </div>
            </div>

            <div class="field">
                <label class="label" for="side1_text"> Side1 text</label>
                <div class="control">
                    <textarea name="side1_text" class="textarea" placeholder="Side 1 text" required >{{ $flashcard->side1_text  }}</textarea>
                </div>
            </div>

            <div class="field">
                <label class="label" for="side2_text"> Side2 text</label>
                <div class="control">
                    <textarea name="side2_text" class="textarea" placeholder="Side 2 text" required>  {{ $flashcard->side2_text  }} </textarea>
                </div>
            </div>

            <div class="field">
                <div class="control">
                    <button type="submit" class="button is-link">Update</button>
                </div>
            </div>
    </form>

    <form method="POST" action="/flashcards/{{ $flashcard->id  }}">
        @csrf
        @method('DELETE')

        <div class="control">
            <button type="submit" class="button">Delete</button>
        </div>

    </form>

    @include('errors')

@endsection