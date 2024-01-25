<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Reservations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->string('celebrant_name');
            $table->string('celebrant_age');
            $table->string('event_theme');
            $table->string('celebrant_gender');
            $table->date('event_date');
            $table->time('event_time');
            $table->string('venue_address');
            $table->boolean('agree_terms');
            $table->enum('reservation_status', ['Pending', 'Approve', 'Decline']);

            $table->unsignedBigInteger('pork_menu_id')->nullable();
            $table->unsignedBigInteger('beef_menu_id')->nullable();
            $table->unsignedBigInteger('pasta_menu_id')->nullable();
            $table->unsignedBigInteger('chicken_menu_id')->nullable();
            $table->unsignedBigInteger('veggies_menu_id')->nullable();
            $table->unsignedBigInteger('fish_menu_id')->nullable();
            $table->unsignedBigInteger('seafood_menu_id')->nullable();
            $table->unsignedBigInteger('dessert_menu_id')->nullable();
            $table->unsignedBigInteger('drink_menu_id')->nullable();

            $table->foreign('pork_menu_id')->references('id')->on('menus');
            $table->foreign('beef_menu_id')->references('id')->on('menus');
            $table->foreign('pasta_menu_id')->references('id')->on('menus');
            $table->foreign('chicken_menu_id')->references('id')->on('menus');
            $table->foreign('veggies_menu_id')->references('id')->on('menus');
            $table->foreign('fish_menu_id')->references('id')->on('menus');
            $table->foreign('seafood_menu_id')->references('id')->on('menus');
            $table->foreign('drink_menu_id')->references('id')->on('menus');
            $table->foreign('dessert_menu_id')->references('id')->on('menus');
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
        Schema::dropIfExists('reservations');
    }
}
