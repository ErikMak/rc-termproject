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
            ->select('cars.model_id', 'brand', 'cars.name', 'equipment.equip_id',
'equipment.name as equip_name')
            ->join('equipment', 'equipment.equip_id', '=', 'cars.model_id')
            ->join('autopark', 'autopark.equip_id', '=', 'equipment.equip_id')
            ->where([
                ['autopark.is_exist', '=', 1]
            ]);

        Schema::createView('exists_cars_view', $query);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropViewIfExists('exists_cars_view');
    }
};
