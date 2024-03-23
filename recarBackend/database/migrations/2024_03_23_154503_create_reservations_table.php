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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned();
            $table->index('user_id', 'users_reserv_idx');
            $table->foreign('user_id', 'users_reserv_fk')->on('users')
                ->references('id');
            $table->date('date_issue');
            $table->date('date_return');
            $table->double('total_cost', 10, 2)->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
