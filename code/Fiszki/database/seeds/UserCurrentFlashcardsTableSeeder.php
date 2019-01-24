<?php

use Illuminate\Database\Seeder;

class UserCurrentFlashcardsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = App\User::all();

        foreach( $users as $u ){

            $user_memoboxes = $u->memoboxes;

            foreach( $user_memoboxes as $m ){
                $flashcards = App\Flashcard::where( 'user_id', $u->id )->where( 'memobox_id', $m->id )->take(1)->get();
                $f = $flashcards[0];
//                dd($f);

                $ucf = new \App\UserCurrentFlashcard;
                $ucf->flashcard_id = $f->id;
                $ucf->memobox_id = $m->id;
                $ucf->user_id = $u->id;
                $ucf->save();
            }

        }

    }
}
