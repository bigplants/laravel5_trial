<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('reservations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('reservation_code')->unique();
            $table->unsignedInteger('rest_user_id');
            $table->unsignedInteger('book_id');
            $table->integer('quantity');
            $table->timestamps();

            $table->foreign('rest_user_id')->references('id')->on('rest_users')->onUpdate('cascade');
            $table->foreign('book_id')->references('id')->on('books')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('reservations');
    }
}
