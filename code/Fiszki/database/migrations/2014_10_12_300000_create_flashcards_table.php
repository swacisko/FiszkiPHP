<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlashcardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
         * Each flashcard has it's id, id of its owner (since for every user there is a copy of that card), category to which that flashcard belongs,
         * and contents of that flashcard.
         * parent_flashcard_id  ->  since every user has its own copy of a flashcard, this is the id of its parent. If parent card will be edited, we will be informed about the change
         */
        Schema::create('flashcards', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('user_id')->nullable()->default(NULL);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');


            $table->unsignedInteger('parent_flashcard_id')->nullable()->default(NULL);
            $table->foreign('parent_flashcard_id')->references('id')->on('flashcards');

            $table->string('category')->default('no category');
            $table->string('side1_text',500)->default('');
            $table->string('side2_text', 500)->default('');
            $table->integer( 'number_of_compartment' )->default(0); // number of compartment in which this card currrently lays in given memobox
            $table->integer( 'number_in_compartment' )->default(0); //

            $table->unsignedInteger('memobox_id')->nullable()->default(NULL);
            $table->foreign( 'memobox_id' )->references('id')->on('memoboxes')->onDelete('set null');

            $table->timestamps();
            $table->date( 'last_edit_date' ); // date of last edit of this card. Needed to notify other users that has this card as a parent
        });

//        $N = 2;
//        for( $i = 1; $i <= $N; ++$i ){
//            DB::table('flashcards')->insert(
//                array(
//                    'user_id' => NULL,
//                    'parent_flashcard_id' => NULL,
//                    'category' => "category $i",
//                    'side1_text' => "side1_text = $i",
//                    'side2_text' => "side2_text = $i",
//                    'last_edit_date' => date('Y-m-d H:i:s')
//                )
//            );
//        }


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flashcards');
    }
}
