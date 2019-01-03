<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlashcardHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
         * history of a flashcard contains its id and dates when those cards where moved from one compartment to the other
         */
        Schema::create('flashcard_history', function (Blueprint $table) {

            $table->unsignedInteger('flashcard_id');
            $table->foreign('flashcard_id')->references('id')->on('flashcards')->onDelete('cascade');

            $table->integer('from_compartment');
            $table->integer('to_compartment');
            $table->date( 'move_date' );
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
        Schema::dropIfExists('flashcard_history');
    }
}
