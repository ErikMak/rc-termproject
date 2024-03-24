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
        Schema::create('favorites', function (Blueprint $table) {
            $table->integer('car_id')->unsigned();
            $table->index('car_id', 'cars_favorites_idx');
            $table->foreign('car_id', 'cars_favorites_fk')->on('cars')
                ->references('model_id');
            $table->integer('user_id')->unsigned();
            $table->index('user_id', 'users_favorites_idx');
            $table->foreign('user_id', 'users_favorites_fk')->on('users')
                ->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('favorites');
    }
};
