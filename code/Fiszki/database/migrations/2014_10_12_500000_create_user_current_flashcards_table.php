<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserCurrentFlashcardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        /*
         * Table representing current state of a user for given memobox.
         */
        Schema::create('user_current_flashcards', function(Blueprint $table){
            $table->increments('id');


            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedInteger('flashcard_id');
            $table->foreign('flashcard_id')->references('id')->on('flashcards');

            $table->unsignedInteger('memobox_id');
            $table->foreign( 'memobox_id' )->references('id')->on('memoboxes');

//            $table->unsignedInteger('current_compartment')->default(0);

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
        Schema::dropIfExists('user_current_flashcards');
    }
}
