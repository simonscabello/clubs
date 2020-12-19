<?php

namespace App\Http\Controllers\API;

use App\Club;
use App\State;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTeamsController;

class ClubsController extends Controller
{

    public function index(): JsonResponse
    {
        $clubs = Club::all();

        return response()->json(['clubs' => $clubs]);
    }

    public function store(Request $request): JsonResponse
    {
        $clubs = Club::create($request->all());

        return response()->json(['team' => $clubs]);
    }

    public function show(Club $club): JsonResponse
    {
        if (!$club){
            return response()->json(['message' => 'Club not found.'], 404);
        }

        return response()->json(['club' => $club]);
    }

    public function update(Request $request, $id): JsonResponse
    {
        $clubs = Club::find($id);
        if (!$clubs){
            return response()->json(['message' => 'Club not found.'], 404);
        }

        $clubs->update($request->all());

        return response()->json(['club' => $clubs]);
    }

    public function destroy($id): JsonResponse
    {
        $teams = Club::find($id);
        if (!$teams){
            return response()->json(['message' => 'Time não encontrado.'], 404);
        }

        $teams->delete();

        return response()->json(['message' => 'Time deletado com sucesso.']);
    }
}
