<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class FavoritesAPITest extends TestCase
{
    use DatabaseTransactions;

    protected $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::create([
            'login' => 'Test003',
            'password' => Hash::make('pass')
        ]);
    }

    public function test_invalid_store_favorites(): void
    {
        $response = $this->actingAs($this->user)->postJson('/api/favorites', [
            'car_id' => 0,
        ]);

        $response->assertStatus(200)
            ->assertJson([
                'status' => false,
                'error' => [
                    'car_id' => ['Машины с таким ID не существует'],
                ]
            ]);
    }

    public function test_success_add_car_to_favorites(): void {
        $response = $this->actingAs($this->user)->postJson('/api/favorites', [
            'car_id' => 1,
        ]);

        $response->assertStatus(200)
            ->assertJson([
                'status' => true,
                'data' => [
                    'car_id' => 1,
                ],
                'message' => 'Машина добавлена в избранное!'
            ]);
    }

    public function test_failed_add_car_to_favorites(): void {
        $response = $this->actingAs($this->user)->postJson('/api/favorites', [
            'car_id' => 1,
        ]);
        $response = $this->actingAs($this->user)->postJson('/api/favorites', [
            'car_id' => 1,
        ]);

        $response->assertStatus(200)
            ->assertJson([
                'status' => false,
                'error' => [
                    'server' => ['Машина уже добавлена в избранное!']
                ]
            ]);
    }

    public function test_get_all_user_reservations() : void {
        $response = $this->actingAs($this->user)->postJson('/api/favorites', [
            'car_id' => 1,
        ]);

        $response = $this->actingAs($this->user)->getJson('/api/favorites');

        $response->assertStatus(200);
        $response->assertJson(fn (AssertableJson $json) =>
        $json->hasAll(['status', 'data'])
            ->has('data', 1)
            ->has('data.0.car', fn (AssertableJson $json) =>
            $json->where('model_id', 1)
                ->where('name', 'Mazda6')
                ->where('category', 'Легковая')
                ->etc()
            )
        );
    }
}
