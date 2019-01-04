@extends('layout')



@section('content')

    <h1 class="title"> Create your own flashcards! </h1>


    <form method="POST" action="/flashcards">
        {{ csrf_field()  }}

        {{--<div class="control">--}}
            {{--<input type="text" class="input" name = "category" placeholder="category">--}}
        {{--</div>--}}

        {{--<div class="control">--}}
            {{--<textarea class="textarea" name="side1_text" placeholder="side1_text"></textarea>--}}
        {{--</div>--}}

        {{--<div class="field">--}}
            {{--<div class="control">--}}
                {{--<textarea class="textarea" name="side2_text" placeholder="side2_text"></textarea>--}}
            {{--</div>--}}
        {{--</div>--}}

        {{--<div class="control">--}}
            {{--<button class="button is-link" type="submit"> Create flashcard </button>--}}
        {{--</div>--}}


        <div class="field" >
            <label class="label" for="Category">Category</label>
            <div class="control" >
                <input type="text" class="input{{ $errors->has('category') ? " is-danger" :""  }}" name="category" placeholder="Category" value="{{old('category')}}" >
            </div>
        </div>

        <div class="field">
            <label class="label" for="side1_text"> Side1 text</label>
            <div class="control">
                <textarea name="side1_text" class="textarea{{ $errors->has('side1_text') ? " is-danger" :""  }}" placeholder="Side 1 text" required >{{old('side1_text')}}</textarea>
            </div>
        </div>

        <div class="field">
            <label class="label" for="side2_text"> Side2 text</label>
            <div class="control">
                <textarea name="side2_text" class="textarea{{ $errors->has('side2_text') ? " is-danger" :""  }}" placeholder="Side 2 text" required>{{old('side2_text')}}</textarea>
            </div>
        </div>

        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">Create!</button>
            </div>
        </div>

        @if($errors->any())
            <div class="notification is-danger">
                <ul>
                    @foreach( $errors->all() as $error )
                        <li> {{ $error }} </li>
                    @endforeach
                </ul>
            </div>
        @endif
    </form>



@endsection