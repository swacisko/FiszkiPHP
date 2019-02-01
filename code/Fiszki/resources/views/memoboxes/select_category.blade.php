<div class="box dropdown">
    <label> Select category </label>
    <select multiple name="select_memoboxes[]" size="2" required>
        {{--<option value="siemka">siemka</option>--}}
        @foreach( \App\Memobox::where( 'user_id', auth()->id() )->get() as $memobox )

            <option value="{{ $memobox->description  }}">{{ $memobox->description  }}</option>

        @endforeach
    </select>
</div>