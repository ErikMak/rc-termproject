<?php

namespace Tests\Feature;

use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class EquipmentAPITest extends TestCase
{
    public function test_get_all_equipments(): void
    {
        $response = $this->get('/api/equipments');

        $response->assertStatus(200);
        $response->assertJson(fn (AssertableJson $json) =>
        $json->hasAll(['status', 'data'])
            ->has('data.0', fn (AssertableJson $json) =>
            $json->where('equip_id', 1)
                ->where('name', '2.0 MT Suprime')
                ->where('price', '1280')
                ->where('long', '30.723095')
                ->where('lat', '58.206988')
                ->where('is_exist', false)
                ->has('car_engine', fn (AssertableJson $json) =>
                    $json->where('mark', 'PEY5')
                    ->etc()
                )
                ->etc()
            )
        );
    }

    public function test_correct_get_equipment_by_model_id(): void {
        $response = $this->get('/api/equipments/1');

        $response->assertStatus(200);
        $response->assertJson(fn (AssertableJson $json) =>
        $json->hasAll(['status', 'data'])
            ->has('data', 3)
            ->has('data.0', fn (AssertableJson $json) =>
            $json->where('equip_id', 1)
                ->where('name', '2.0 MT Suprime')
                ->where('price', '1280')
                ->where('long', '30.723095')
                ->where('lat', '58.206988')
                ->where('is_exist', false)
                ->has('car_engine', fn (AssertableJson $json) =>
                $json->where('mark', 'PEY5')
                    ->etc()
                )
                ->etc()
            )
        );
    }

    public function test_incorrect_get_equipment_by_model_id(): void {
        $response = $this->get('/api/equipments/0');

        $response->assertStatus(404)
            ->assertJson([
                'status' => false,
                'error' => [
                    'server' => ['Комплектации на машину не найдены']
                ]
            ]);
    }
}
