<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->decimal('price', 8, 2);
            $table->integer('serving')->default(8)->comment('Number of servings');
            $table->enum('status', ['active', 'inactive']);
            $table->unsignedBigInteger('menu_selection_id');
            $table->foreign('menu_selection_id')->references('id')->on('menu_selections');
            $table->string('menus_image')->nullable();
            $table->timestamps();
        });
    }

 

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
