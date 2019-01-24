<?php

use Illuminate\Database\Seeder;

use App\Flashcard;

class FlashcardsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //  $flashcards = factory( FlashCard::class, 10 )->create();

        $users = App\User::all();
//
        $memoId = 0;
        $memoboxes = App\Memobox::all();
        $noc = 0;
        $nic = 1;
        $ind = 0;

        factory(App\Flashcard::class, 1 + count($users) * count($memoboxes))->create()->each(function($f) use ($users, $memoboxes, &$memoId, &$nic, &$noc, &$ind) {

//            $ind = rand(0, count($users)-1 );

            $u = $users[$ind % count($users) ];
            $ind++;
//            $f->user_id = $u->id;
            $f->user()->associate( $u );

            $memobox = $memoboxes[ $memoId % count( $memoboxes ) ];
            $memoId++;
            $f->memobox()->associate( $memobox );


            $f->number_of_compartment = $noc % ($memobox->number_of_compartments+2);
            $noc++;

            $f->number_in_compartment = $nic;
            $nic++;

            $f->save();
        });


    }
}
