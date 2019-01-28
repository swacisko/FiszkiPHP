


<div class="content">
    <div class="box">
        <legend class="label has-text-centered"> Current flashcard information </legend>
        <ul>
            <li> Flashcard id: {{ $flashcard->id  }} </li>
            <li> In compartment: {{$flashcard->number_of_compartment}} </li>
            <li> In memobox: {{$flashcard->memobox->id}} </li>
        </ul>
    </div>
</div>