


<div class="content">
    <div class="box">
        <legend class="label has-text-centered">Memobox compartment statistics </legend>
        <ul>
            <li>Total number of flashcards in memobox: {{ $memobox->count_all_flashcards()  }} </li>
            @for( $i=0; $i < $memobox->number_of_compartments+2; $i++ )
                {{--<li>i = {{$i}}</li>--}}
                @if( $i == 0 ) <li>Flashcards waiting to be learned: {{ $memobox->count_flashcards_in_compartment($i)  }}</li>
                @elseif( $i == $memobox->number_of_compartments+1 )  <li>Flashcards learned: {{ $memobox->count_flashcards_in_compartment($i)  }} </li>
                @else <li> Flashcards in {{$i}} compartment: {{ $memobox->count_flashcards_in_compartment($i)  }} / {{ $memobox->getCompartmentSize($i)  }} </li>
                @endif

            @endfor

            <li>First compartment size: {{$memobox->first_compartment_size}}</li>
            <li>Capacity factor: {{$memobox->capacity_factor}}</li>
            <li>Current compartment: {{ $memobox->current_flashcard()->number_of_compartment }}</li>

        </ul>
    </div>
</div>