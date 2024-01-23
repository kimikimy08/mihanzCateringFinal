<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ReservationPremades extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservation_premades', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('reservation_id');
            $table->unsignedBigInteger('package_id');
            $table->timestamps();

            $table->foreign('reservation_id')->references('id')->on('reservations')->onDelete('cascade');
            $table->foreign('package_id')->references('id')->on('service_packages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservation_premades');
    }
}
