<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserCurrentFlashcardTable extends Migration
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
        Schema::create('user_current_flashcard', function(Blueprint $table){
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedInteger('flashcard_id');
            $table->foreign('flashcard_id')->references('id')->on('flashcard');

            $table->unsignedInteger('memobox_id');
            $table->foreign( 'memobox_id' )->references('id')->on('memobox');
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
        Schema::dropIfExists('user_current_flashcard');
    }
}
