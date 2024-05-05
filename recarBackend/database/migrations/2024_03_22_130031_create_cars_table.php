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
            $table->double('price', 10, 2)->unsigned();
            $table->string('country', 15);
            $table->double('weight', 5, 1)->unsigned();
            $table->double('tank', 3, 1)->unsigned();
            $table->integer('year')->unsigned();
            $table->text('img');
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
