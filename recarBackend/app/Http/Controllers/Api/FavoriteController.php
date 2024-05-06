<?php

namespace App\Http\Controllers\Api;

use App\Http\Filters\FavoriteFilter;
use App\Http\Filters\Filterable;
use App\Http\Requests\StoreFavorite;
use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends BaseController
{
    use Filterable;
    /**
     * Display a listing of the resource.
     */
    public function index(FavoriteFilter $filter)
    {
        $favorites = Favorite::filter($filter)->with('car')->get();

        return $this->sendResponse($favorites);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFavorite $request)
    {
        $validated = $request->validated();

        $favorite = Favorite::where([
            ['car_id', '=', $validated['car_id']],
            ['user_id', '=', $validated['user_id']],
        ])->get();

        if($favorite->count() == 0) {
            Favorite::create([
                'car_id' => $validated['car_id'],
                'user_id' => $validated['user_id']
            ]);
            return $this->sendResponse($validated, 'Машина добавлена в избранное!');
        } else {
            return $this->sendResponse($validated, 'Машина уже добавлена в избранное!');
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
    public function destroy(string $car_id)
    {
        $user_id = Auth::user()->id;

        $favorite = Favorite::where([
            ['car_id', '=', $car_id],
            ['user_id', '=', $user_id],
        ])->delete();

        $this->sendResponse([]);
    }
}
