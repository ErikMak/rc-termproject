<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class UserAPITest extends TestCase
{
    use DatabaseTransactions;

    protected $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::create([
            'login' => 'Test005',
            'password' => Hash::make('pass')
        ]);
    }

    public function test_invalid_update_user_info(): void {
        $response = $this->actingAs($this->user)->putJson('/api/user', [
            'exp' => -1,
            'gender' => 2,
        ]);

        $response->assertStatus(200)
            ->assertJson([
                'status' => false,
                'error' => [
                    'gender' => ['Пол должен быть булевым типом данных'],
                    'exp' => ['Водительский опыт не может быть отрицательным']
                ]
            ]);
    }

    public function test_valid_update_user_info(): void {
        $response = $this->actingAs($this->user)->putJson('/api/user', [
            'exp' => 30,
            'gender' => false,
        ]);

        $response->assertStatus(200);
        $response->assertJson(fn (AssertableJson $json) =>
            $json->hasAll(['status', 'data', 'message'])
                ->where('message', 'Данные водителя обновлены!')
            ->has('data', fn (AssertableJson $json) =>
                    $json->has('id')
                    ->where('exp', 30)
                    ->where('gender', false)
                    ->where('login', 'Test005')
                    ->has('balance')
                )
        );

        $this->assertEquals(30, $this->user->exp);
        $this->assertEquals(0, $this->user->gender);
    }
}
