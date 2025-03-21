<?php

namespace Tests\Feature;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class CommentAPITest extends TestCase
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

    public function test_correct_get_comments_by_model_id(): void
    {
        Comment::create([
            'car_id' => 1,
            'user_id' => 1,
            'text' => 'Lorem ipsum',
            'rating' => 5.0
        ]);

        $response = $this->get('/api/comments/1');
        $comment = Comment::where('car_id', 1)->first();

        $response->assertStatus(200);
        $response->assertJson(fn (AssertableJson $json) =>
        $json->hasAll(['status', 'data'])
            ->has('data.0', fn (AssertableJson $json) =>
            $json->has('id')
                ->whereType('user', 'string')
                ->where('text', $comment->text)
                ->has('rating')
                ->whereType('created_at', 'string')
            )
        );
    }

    public function test_valid_store_comment(): void {
        $response = $this->actingAs($this->user)->postJson('/api/comments', [
            'car_id' => 1,
            'text' => 'Lorem ipsum dolor',
            'rating' => 3.5,
        ]);

        $response->assertStatus(200)
            ->assertJson([
                'status' => true,
                'message' => 'Отзыв добавлен!'
            ]);
    }

    public function test_invalid_store_comment(): void {
        $response = $this->actingAs($this->user)->postJson('/api/comments', [
            'car_id' => 0,
            'text' => ';;',
            'rating' => 0,
        ]);

        $response->assertStatus(200)
            ->assertJson([
                'status' => false,
                'error' => [
                    'car_id' => ['Машины с таким ID не существует'],
                    'rating' => ['Оценка должна быть числом с плавающей точкой и одним знаком после запятой'],
                    'text' => ['Присутствуют недопустимые символы или длина комментария превышает 500 символов']
                ]
            ]);
    }

    public function test_comment_already_added(): void {
        $response = $this->actingAs($this->user)->postJson('/api/comments', [
            'car_id' => 1,
            'text' => 'Lorem ipsum dolor',
            'rating' => 3.5,
        ]);
        $response = $this->actingAs($this->user)->postJson('/api/comments', [
            'car_id' => 1,
            'text' => 'Lorem ipsum dolor',
            'rating' => 3.5,
        ]);

        $response->assertStatus(200)
            ->assertJson([
                'status' => false,
                'error' => [
                    'server' => ['Отзыв уже добавлен!']
                ]
            ]);
    }

    public function test_get_rating_by_model_id() : void {
        Comment::create([
            'car_id' => 1,
            'user_id' => 1,
            'text' => 'Lorem ipsum',
            'rating' => 3
        ]);

        $response = $this->get('/api/cars/rating/1');

        $response->assertStatus(200)
            ->assertJson(fn (AssertableJson $json) =>
                $json->where('status', True)
                    ->where('data', fn (int $rating) => $rating >= 0 and $rating <= 5)
            );
    }
}
