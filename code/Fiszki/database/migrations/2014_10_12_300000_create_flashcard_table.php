<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlashcardTable extends Migration
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
        Schema::create('flashcard', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');


            $table->unsignedInteger('parent_flashcard_id');
            $table->foreign('parent_flashcard_id')->references('id')->on('flashcard');

            $table->string('category');
            $table->string('side1_text');
            $table->string('side2_text');
            $table->integer( 'number_of_compartment' ); // number of compartment in which this card currrently lays in given memobox
            $table->integer( 'number_in_compartment' );

            $table->unsignedInteger('memobox_id')->nullable();
            $table->foreign( 'memobox_id' )->references('id')->on('memobox')->onDelete('set null');

            $table->date( 'last_edit_date' ); // date of last edit of this card. Needed to notifu other users that has this card as a parent
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flashcard');
    }
}
