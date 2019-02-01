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
        <input type="text" class="input{{ $errors->has('category') ? " is-danger" :""  }}" name="category" placeholder="Category"
               value="{{ isset($flashcard) ? $flashcard->category : old('category')}}" >
    </div>
</div>

<div class="field">
    <label class="label" for="side1_text"> Side1 text</label>
    <div class="control">
        <textarea name="side1_text" class="textarea{{ $errors->has('side1_text') ? " is-danger" :""  }}" placeholder="Side 1 text" required >{{ isset($flashcard) ? $flashcard->side1_text : old('side1_text')}}</textarea>
    </div>
</div>

<div class="field">
    <label class="label" for="side2_text"> Side2 text</label>
    <div class="control">
        <textarea name="side2_text" class="textarea{{ $errors->has('side2_text') ? " is-danger" :""  }}" placeholder="Side 2 text" required>{{ isset($flashcard) ? $flashcard->side2_text : old('side2_text')}}</textarea>
    </div>
</div>

@if( isset($create) )
    @include('memoboxes.select_memoboxes')
@endif

<div class="field">
    <div class="control">
        <button type="submit" class="button is-link"> Approve! </button>
    </div>
</div>
