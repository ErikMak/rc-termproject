<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreCommentRequest;
use App\Http\Resources\Comment\CommentResource;
use App\Http\Services\PermissionService;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Number;

class CommentController extends BaseController
{
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
    public function store(StoreCommentRequest $request)
    {
        $validated = $request->validated();

        $comment = Comment::create([
            'car_id' => $validated['car_id'],
            'user_id' => $validated['user_id'],
            'text' => $validated['text'],
            'rating' => $validated['rating']
        ]);

        return $this->sendResponse($validated, 'Комментарий добавлен!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $model_id)
    {
        $comments = Comment::where('car_id', $model_id)->get();

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
    public function destroy(string $comment_id)
    {
        $comment = Comment::find($comment_id);

        if(is_null($comment)) {
            return $this->sendError('Комментария с таким ID не существует');
        }

        if(!PermissionService::getInstance()->canDelete($comment)) {
            return $this->sendError('У вас нет прав на удаление этой записи');
        }

        $comment->delete();
        $this->sendResponse([]);
    }

    public function rating(string $model_id) {
        $comments = Comment::where('car_id', $model_id)->get();

        $rating = 0;
        foreach ($comments as $comment) {
            $rating += $comment['rating'];
        }
        $rating = Number::format($rating/$comments->count(), maxPrecision: 1);

        return $this->sendResponse($rating);
    }
}
