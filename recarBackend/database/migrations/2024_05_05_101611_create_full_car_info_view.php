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
            ->select('cars.model_id', 'veh_class', 'brand', 'cars.name', 'equipment.equip_id', 'weight', 'year',
            'equipment.name as equip_name', 'transmission', 'engines.id', 'mark', 'volume', 'engines.HP', 'engines.fuel as engine_fuel',
            'engines.type', 'is_exist', 'autopark.fuel', 'drive', 'autopark.long as long', 'autopark.lat as lat')
            ->join('equipment', 'equipment.equip_id', '=', 'cars.model_id')
            ->join('engines', 'engines.id', '=', 'equipment.engine')
            ->join('autopark', 'autopark.equip_id', '=', 'equipment.equip_id');

       Schema::createView('full_car_info_view', $query);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropViewIfExists('full_car_info_view');
    }
};
