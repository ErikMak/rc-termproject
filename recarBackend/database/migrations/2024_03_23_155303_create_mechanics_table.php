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
        Schema::create('mechanics', function (Blueprint $table) {
            $table->increments('mechanic_id');
            $table->string('name', 30);
            $table->integer('parking_id')->unsigned();
            $table->index('parking_id', 'parking_mechanics_idx');
            $table->foreign('parking_id', 'parking_mechanics_fk')->on('parking')
                ->references('parking_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mechanics');
    }
};
