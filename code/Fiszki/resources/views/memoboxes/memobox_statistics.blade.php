


<div class="content">
    <div class="box">
        <legend class="label has-text-centered"> Memobox compartment statistics </legend>
        <ul>
            <li>Total number of flashcards in memobox: {{ $memobox->count_all_flashcards()  }} </li>

            @php
                $color="warning"
            @endphp

            @for( $i=0; $i < $memobox->number_of_compartments+2; $i++ )

                @if( $i == $memobox->current_flashcard()->number_of_compartment )
                    @php
                        $color = "danger"
                    @endphp
                @else
                    @php
                        $color = "warning"
                    @endphp
                @endif

                @if( $i == 0 )
                        <li>
                            Flashcards in {{$i}} compartment (waiting to be learned): {{ $memobox->count_flashcards_in_compartment($i)  }}
                            <progress class="progress is-{{ $memobox->current_flashcard()->number_of_compartment == 0 ? "danger" : "info"  }}" value="{{ $memobox->count_flashcards_in_compartment($i) }}" max="{{ $memobox->count_all_flashcards() }}"></progress>
                        </li>
                @elseif( $i == $memobox->number_of_compartments+1 )
                       <li>
                            Flashcards in {{$i}} compartment (flashcards learned): {{ $memobox->count_flashcards_in_compartment($i)  }}
                           <progress class="progress is-success" value="{{ $memobox->count_flashcards_in_compartment($i) }}"
                                     max="{{ $memobox->count_all_flashcards() }}"></progress>
                       </li>
                @else  <li>
                        Flashcards in {{$i}} compartment: {{ $memobox->count_flashcards_in_compartment($i)  }} / {{ $memobox->getCompartmentSize($i)  }}

                        <progress class="progress is-{{$color}}" value="{{ $memobox->count_flashcards_in_compartment($i) }}" max="{{$memobox->getCompartmentSize($i)}}"></progress>
                       </li>
                @endif

            @endfor

            <li>First compartment size: {{$memobox->first_compartment_size}}</li>
            <li>Capacity factor: {{$memobox->capacity_factor}}</li>
            <li>Current compartment: {{ $memobox->current_flashcard()->number_of_compartment }}</li>

        </ul>
    </div>
</div>