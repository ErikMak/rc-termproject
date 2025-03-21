<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreFavorite;
use App\Http\Resources\Favorite\FavoriteCollection;
use App\Models\Favorite;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FavoriteController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) : JsonResponse
    {
        $user_id = Auth::user()->id;

        $favorites = Favorite::where('favorites.user_id', $user_id)->with('car')->get();

        return $this->sendResponse(FavoriteCollection::collection($favorites));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFavorite $request) : JsonResponse
    {
        $validated = $request->validated();

        $user_id = Auth::user()->id;

        $favorite = Favorite::where([
            ['car_id', '=', $validated['car_id']],
            ['user_id', '=', $user_id],
        ])->get();

        if($favorite->count() == 0) {
            Favorite::create([
                'car_id' => $validated['car_id'],
                'user_id' => $user_id
            ]);
            return $this->sendResponse($validated, 'Машина добавлена в избранное!');
        } else {
            return $this->sendError('Машина уже добавлена в избранное!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Favorite $favorite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Favorite $favorite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $car_id) : JsonResponse
    {
        $user_id = Auth::user()->id;

        DB::select('call delete_car_from_favorites(?, ?)', array(
            $car_id, $user_id
        ));

        return $this->sendResponse('Машина удалена из избранного!');
    }
}
