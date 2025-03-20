<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class ReservationAPITest extends TestCase
{

    use DatabaseTransactions;

    protected $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::create([
            'login' => 'Test004',
            'password' => Hash::make('pass')
        ]);
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
            'total_cost' => -50
        ]);

        $response->assertStatus(200)
            ->assertJson([
                'status' => false,
                'error' => [
                    'model_id' => ['Машины с таким ID не существует'],
                    'equip_id' => ['Комплектации с таким ID не существует'],
                    'date_issue' => ['Дата начала аренды должна быть выражена строкой, совместимой с функцией strtotime'],
                    'date_return' => ['Дата конца аренды должна быть выражена строкой, совместимой с функцией strtotime'],
                    'total_cost' => ['Итоговая цена должна быть положительной']
                ]
            ]);
    }
}
