<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemoboxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//            dd(doubleval( config( 'flashcards.memobox.capacity_factor' ) ));
        Schema::create('memoboxes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description');

            $table->unsignedInteger('user_id')->nullable()->default(NULL);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // id of the user that owns this memobox

            $table->integer('number_of_compartments');
            $table->integer( 'first_compartment_size' )->default(30);
            $table->double('capacity_factor')->default( doubleval( config( 'flashcards.memobox.capacity_factor' ) ) );

            $table->timestamps();
        });

//        DB::table('memoboxes')->insert(
//            array(
//                'description' => 'ToLearn',
//                'user_id' => 1,
//                'number_of_compartments' => 5
//            )
//        );

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('memoboxes');
    }
}
