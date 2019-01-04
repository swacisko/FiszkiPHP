<?php

use Illuminate\Database\Seeder;

class MemoboxesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = App\User::all();

        $flashcards = App\Flashcard::all();
        $nextCard = 0;

//        dd($users);

        $memoboxForUser = 0;

        factory( App\Memobox::class, count($users) )->create()->each( function ($m) use (&$users, &$memoboxForUser, &$flashcards, $nextCard){

            $m->user_id = $users[ $memoboxForUser ]->id;
            $memoboxForUser++;

            

            $m->save();

        } );
    }
}
