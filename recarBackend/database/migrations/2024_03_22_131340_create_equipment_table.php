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
        Schema::create('equipment', function (Blueprint $table) {
            $table->increments('equip_id');
            $table->integer('model_id')->unsigned();
            $table->index('model_id', 'cars_equip_idx');
            $table->foreign('model_id', 'cars_equip_fk')->on('cars')
                ->references('model_id');
            $table->text('name');
            $table->string('transmission', 10);
            $table->integer('engine')->unsigned();
            $table->index('engine', 'engines_equip_idx');
            $table->foreign('engine', 'engines_equip_fk')->on('engines')
                ->references('id');
            $table->string('drive', 15);
            $table->double('price', 10, 2)->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipment');
    }
};
