<div class="content">
    <div class="box">
        {{--<legend class="label has-text-centered"> Current flashcard information </legend>--}}
        <ul style="list-style-type:none">
            <li style="color:black"> {{--Category: --}}{{ isset($flashcard) ? $flashcard->category : "null"  }} </li>
            <li style="color:red"> {{--Side 1 text: --}}{{ isset($flashcard) ? $flashcard->side1_text : "null" }} </li>
            <li style="color:blue"> {{--Side 2 text:--}} {{ isset($flashcard) ? $flashcard->side2_text : "null" }} </li>
        </ul>
    </div>
</div>