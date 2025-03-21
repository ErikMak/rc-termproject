<?php

namespace Tests\Feature;

use App\Models\User;
use App\Services\IntegrationAIService;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class ReservationAPITest extends TestCase
{

    use DatabaseTransactions;

    protected $user;

    private $integrationAIService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::create([
            'login' => 'Test004',
            'password' => Hash::make('pass')
        ]);

        $this->integrationAIService = $this->createMock(IntegrationAIService::class);
    }
    /**
     * A basic feature test example.
     */
    public function test_invalid_store_reservation(): void
    {
        $response = $this->actingAs($this->user)->postJson('/api/reservation', [
            'model_id' => 0,
            'equip_id' => 0,
            'date_issue' => 'lorem',
            'date_return' => 'lorem',
            'total_cost' => -50,
            'peop_in_car' => 0
        ]);

        $response->assertStatus(200)
            ->assertJson([
                'status' => false,
                'error' => [
                    'model_id' => ['Машины с таким ID не существует'],
                    'equip_id' => ['Комплектации с таким ID не существует'],
                    'date_issue' => ['Дата начала аренды должна быть выражена строкой, совместимой с функцией strtotime'],
                    'date_return' => ['Дата конца аренды должна быть выражена строкой, совместимой с функцией strtotime'],
                    'total_cost' => ['Итоговая цена должна быть положительной'],
                    'peop_in_car' => ['Количество людей в машине должно быть не менее 1']
                ]
            ]);
    }

    public function test_insufficient_funds_reservation() : void {
        $response = $this->actingAs($this->user)->postJson('/api/reservation', [
            'model_id' => 1,
            'equip_id' => 2,
            'date_issue' => "2025-03-21T00:00:00+03:00",
            'date_return' => "2025-03-23T00:00:00+03:00",
            'total_cost' => 400,
            'peop_in_car' => 1
        ]);

        $response->assertStatus(200)
            ->assertJson([
                'status' => false,
                'error' => [
                    'server' => ['Недостаточно средств!']
                ]
            ]);
    }

    public function test_equipment_not_exist_reservation() : void {
        $response = $this->actingAs($this->user)->postJson('/api/reservation', [
            'model_id' => 2,
            'equip_id' => 1,
            'date_issue' => "2025-03-21T00:00:00+03:00",
            'date_return' => "2025-03-23T00:00:00+03:00",
            'total_cost' => 400,
            'peop_in_car' => 1
        ]);

        $response->assertStatus(200)
            ->assertJson([
                'status' => false,
                'error' => [
                    'server' => ['Комплектация не доступна для аренды!']
                ]
            ]);
    }
}
