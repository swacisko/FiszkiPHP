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
        $nextCard = 0;
        $memoboxForUser = 0;

        factory( App\Memobox::class, count($users)-1 )->create()->each( function ($m) use (&$users, &$memoboxForUser, $nextCard){
//            $m->user_id = $users[ $memoboxForUser ]->id;
//            $memoboxForUser++;
//            $m->save();

            $users[ $memoboxForUser ]->memoboxes()->save( $m );
            $memoboxForUser++;
            $memoboxForUser %= count($users);
        } );


        App\Memobox::create([
            'description' => 'test',
            'number_of_compartments' => 3,
            'user_id' => count( App\User::all() ),
            'capacity_factor' => 1.5,
            'first_compartment_size' => 5
        ]);

    }
}
