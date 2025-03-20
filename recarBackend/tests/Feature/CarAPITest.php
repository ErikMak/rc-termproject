<?php

namespace Tests\Feature;

use App\Models\Car;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class CarAPITest extends TestCase
{
    public function test_get_all_cars(): void
    {
        $response = $this->get('/api/cars');

        $response->assertStatus(200);
        $response->assertJson(fn (AssertableJson $json) =>
            $json->hasAll(['status', 'data'])
                ->has('data.cars', 15)
                ->has('data.cars.0', fn (AssertableJson $json) =>
                $json->where('model_id', 1)
                    ->where('name', 'Mazda6')
                    ->where('category', 'Легковая')
                    ->etc()
                )
        );
    }

    public function test_correct_get_car_by_slug(): void {
        $car = Car::all()->first();
        $slug = $car->slug;

        $response = $this->get('/api/cars/'.$slug);
        $response->assertStatus(200);
        $response->assertJson(fn (AssertableJson $json) =>
        $json->hasAll(['status', 'data'])
            ->has('data', fn (AssertableJson $json) =>
            $json->where('model_id', 1)
                ->where('name', $car->name)
                ->where('veh_class', $car->veh_class)
                ->etc()
            )
        );
    }

    public function test_incorrect_get_car_by_slug(): void {
        $response = $this->get('/api/cars/mazda-mazda6');
        $response->assertStatus(404)
            ->assertJson([
                'status' => false,
                'error' => [
                    'server' => ['Автомобиль не найден']
                ]
            ]);
    }

    public function test_find_car_by_name(): void {
        $response = $this->get('/api/cars/find');

        $response->assertStatus(200);
        $response->assertJson(fn (AssertableJson $json) =>
        $json->hasAll(['status', 'data'])
            ->has('data.cars', 15)
            ->has('data.cars.0', fn (AssertableJson $json) =>
            $json->where('model_id', 1)
                ->where('name', 'Mazda6')
                ->where('category', 'Легковая')
                ->etc()
            )
        );

        $response = $this->get('/api/cars/find?name=bmw');
        $response->assertJson(fn (AssertableJson $json) =>
        $json->hasAll(['status', 'data'])
            ->has('data.cars', 2)
        );
    }
}
