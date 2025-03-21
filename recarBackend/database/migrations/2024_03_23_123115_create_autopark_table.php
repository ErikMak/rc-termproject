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
        Schema::create('autopark', function (Blueprint $table) {
           $table->integer('equip_id')->unsigned();
           $table->index('equip_id', 'equip_autopark_idx');
           $table->foreign('equip_id', 'equip_autopark_fk')->on('equipment')
               ->references('equip_id')->onDelete('cascade');
           $table->integer('parking_id')->unsigned();
           $table->index('parking_id', 'parking_idx');
           $table->foreign('parking_id', 'parking_autopark_fk')->on('parking')
               ->references('parking_id')->onDelete('cascade');
           $table->tinyInteger('is_exist')->default('0');
           $table->integer('fuel')->unsigned()->default('0');
           $table->double('lat', 3, 6);
           $table->double('long', 3, 6);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('autopark');
    }
};
