


            {{--{{ dd($flashcard) }};--}}
<div class="content">
    <div class="box">
        <legend class="label has-text-centered"> Current flashcard information </legend>
        <ul>
            <li> Flashcard id: {{ isset($flashcard) ? $flashcard->id : "null"  }} </li>
            <li> In compartment: {{ isset($flashcard) ? $flashcard->number_of_compartment : "null" }} </li>
            <li> In memobox: {{ isset($flashcard) ? $flashcard->memobox->id : "null" }} </li>
        </ul>
    </div>
</div>