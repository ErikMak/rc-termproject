<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

use Staudenmeir\LaravelMigrationViews\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $query = DB::table('cars')
            ->select('cars.model_id', 'brand', 'equipment.price', 'cars.name')
            ->join('equipment', 'equipment.equip_id', '=', 'cars.model_id')
            ->where('equipment.price' , '<', 20)
            ->orderBy('equipment.price')
            ->limit(4);

        Schema::createView('chip_cars_view', $query);
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropViewIfExists('chip_cars_view');
    }
};
