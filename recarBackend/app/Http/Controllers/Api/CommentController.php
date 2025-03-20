<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreCommentRequest;
use App\Http\Resources\Comment\CommentResource;
use App\Models\Comment;
use App\Services\CommentService;
use app\Services\PermissionService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends BaseController
{
    protected CommentService $commentService;
    public function __construct() {
        $this->commentService = new CommentService();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCommentRequest $request) : JsonResponse
    {
        $validated = $request->validated();
        $user_id = Auth::user()->id;
        $comment = Comment::where('user_id', $user_id)
        ->where('car_id', $validated['car_id'])
        ->get();

        if($comment->count() == 0) {
            $comment = Comment::create([
                'car_id' => $validated['car_id'],
                'user_id' => $user_id,
                'text' => $validated['text'],
                'rating' => $validated['rating']
            ]);

            return $this->sendResponse($comment, 'Отзыв добавлен!');
        }

        return $this->sendError('Отзыв уже добавлен!');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $model_id) : JsonResponse
    {
        $comments = Comment::where('car_id', $model_id)->with('user')->get();

        return $this->sendResponse(CommentResource::collection($comments));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $comment_id) : JsonResponse
    {
        $comment = Comment::find($comment_id);

        if(is_null($comment)) {
            return $this->sendError('Комментария с таким ID не существует');
        }

        if(!PermissionService::getInstance()->canDelete($comment)) {
            return $this->sendError('У вас нет прав на удаление этой записи');
        }

        $comment->delete();
        return $this->sendResponse([]);
    }

    public function rating(int $model_id) : JsonResponse {
        $rating = $this->commentService->calculateRatingForCar($model_id);
        return $this->sendResponse($rating);
    }
}
