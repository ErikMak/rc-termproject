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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->integer('car_id')->unsigned();
            $table->index('car_id', 'cars_comments_idx');
            $table->foreign('car_id', 'cars_comments_fk')->on('cars')
                ->references('model_id');
            $table->integer('user_id')->unsigned();
            $table->index('user_id', 'users_comments_idx');
            $table->foreign('user_id', 'users_comments_fk')->on('users')
                ->references('id');
            $table->text('text');
            $table->double('rating', 3, 1)
                ->unsigned()
                ->default(0.0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
