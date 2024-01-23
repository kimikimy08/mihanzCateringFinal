<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ReservationSelections extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservation_selections', function (Blueprint $table) {
            $table->id();
            $table->string('categoryName');
            $table->enum('choice', ['customize', 'premade']);
            $table->unsignedBigInteger('reservation_id');
            $table->timestamps();

            $table->foreign('reservation_id')->references('id')->on('reservations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservation_selections');
    }
}
