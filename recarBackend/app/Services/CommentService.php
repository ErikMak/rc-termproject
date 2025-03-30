<?php

namespace App\Services;


use App\Models\Comment;

class CommentService
{
    public function calculateRatingForCar(int $model_id) : float {
        $comments = Comment::where('car_id', $model_id)->get();

        if(!$comments->count())
            return 0;

        $rating = 0;
        foreach ($comments as $comment) {
            $rating += $comment['rating'];
        }

        return round($rating/$comments->count(), 1);
    }
}
