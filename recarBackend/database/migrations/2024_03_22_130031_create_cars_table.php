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
        Schema::create('cars', function (Blueprint $table) {
            $table->increments('model_id');
            $table->text('name');
            $table->string('category', 20);
            $table->string('brand', 20);
            $table->string('type', 20);
            $table->unsignedTinyInteger('veh_class');
            $table->string('country', 15);
            $table->unsignedInteger('weight');
            $table->double('tank', 3, 1)->unsigned();
            $table->unsignedInteger('year');
            $table->string('img', 255);
            $table->text('slug')->unique();
            $table->text('flag');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
