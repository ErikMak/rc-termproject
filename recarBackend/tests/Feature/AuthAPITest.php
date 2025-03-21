<?php

namespace Tests\Feature;


use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class AuthAPITest extends TestCase
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

    public function test_correct_user_info() {
        $this->user->balance = 1000;
        $this->user->exp = 20;
        $this->user->gender = 1;
        $this->user->save();

        $response = $this->actingAs($this->user)->getJson('/api/auth/user');



        $response->assertStatus(200);
        $response->assertJson(fn (AssertableJson $json) =>
        $json->hasAll(['status', 'data'])
            ->has('data', fn (AssertableJson $json) =>
            $json->where('exp', 20)
                ->where('gender', 1)
                ->where('login', 'Test003')
                ->has('id')
            )
        );
    }
}
