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
//            dd($users);
        factory(App\Flashcard::class, 2)->create()->each(function($f) use ($users) {

            $ind = rand(0, count($users)-1 );

            $u = $users[$ind];
            $f->user_id = $u->id;
            $f->assignUser()->save( compact('u') );
        });


    }
}
