<?php

namespace App\Http\Controllers\API;

use App\Club;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClubsController;

class ClubsController extends Controller
{

    public function index(): JsonResponse
    {
        $clubs = Club::with('states')->get();
//        $clubs = Club::all();

        return response()->json(['clubs' => $clubs]);
    }

    public function store(StoreClubsController $request): JsonResponse
    {
        $clubs = Club::create($request->all());

        return response()->json(['club' => $clubs]);
    }

    public function show(Club $club): JsonResponse
    {
        if (!$club){
            return response()->json(['message' => 'Club not found.'], 404);
        }

        $club->load('states'); // usar quando nao estiver usando with na model

        return response()->json(['club' => $club]);
    }

    public function update(StoreClubsController $request, $id): JsonResponse
    {
        $club = Club::find($id);

        if (!$club){
            return response()->json(['message' => 'Club not found.'], 404);
        }

        $club->update($request->all());

        return response()->json(['club' => $club], 200);
    }

    public function destroy($id): JsonResponse
    {
        $club = Club::find($id);

        if (!$club){
            return response()->json(['message' => 'Club not found.'], 404);
        }

        $club->delete();

        return response()->json(['message' => 'Club deleted.'], 200);
    }
}
