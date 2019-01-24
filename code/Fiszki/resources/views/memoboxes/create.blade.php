@extends('layouts.layout')



@section('content')

    <h1 class="title"> Create new memobox </h1>

    <form method="POST" action="/memoboxes">
        {{ csrf_field()  }}


        <div class="field" >
            <label class="label" for="description">Description</label>
            <div class="control" >
                <input type="text" class="input{{ $errors->has('category') ? " is-danger" :""  }}" name="description" placeholder="Description" value="{{old('description')}}" required >
            </div>
        </div>

        <div class="field">
            <label class="label" for="number_of_compartments"> Number of compartments</label>
            <div class="control">
                <textarea name="number_of_compartments" class="textarea{{ $errors->has('number_of_compartments') ? " is-danger" :""  }}" placeholder="number_of_compartments"
                          required >{{old('number_of_compartments')}}</textarea>
            </div>
        </div>

        <div class="field">
            <label class="label" for="first_compartment_size"> First compartment size</label>
            <div class="control">
                <textarea name="first_compartment_size" class="textarea{{ $errors->has('first_compartment_size') ? " is-danger" :""  }}"
                          placeholder="first_compartment_size" required>{{old('first_compartment_size')}}</textarea>
            </div>
        </div>

        <div class="field">
            <label class="label" for="capacity_factor"> Capacity factor</label>
            <div class="control">
                <textarea name="capacity_factor" class="textarea{{ $errors->has('capacity_factor') ? " is-danger" :""  }}"
                          placeholder="capacity_factor" required>{{old('capacity_factor')}}</textarea>
            </div>
        </div>

        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">Create!</button>
            </div>
        </div>

        @include('errors')

    </form>



@endsection

