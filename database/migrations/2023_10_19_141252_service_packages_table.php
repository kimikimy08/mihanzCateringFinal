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
        Schema::create('service_packages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('pax');
            $table->decimal('price', 8, 2);
            $table->unsignedBigInteger('service_selection_id');
            $table->foreign('service_selection_id')->references('id')->on('service_selections');
            $table->string('service_pckg_image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_packages');
    }
};
